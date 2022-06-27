<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Admin\UserCreate;
use App\Mail\Frontend\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use illuminate\support\Str;
use Swift_TransportException;

class UserController extends Controller
{
    protected $usersModel;

    public function __construct(User $usersModel)
    {
        $this->usersModel = $usersModel;
    }

    public function index(User $model)
    {
        $users = $this->usersModel->getAll('paginate', 15);

        return view('admin.usersManagement.index')
                ->with(compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.usersManagement.create')
                ->with(compact('roles'));
    }

    public function store(Request $request, User $model)
    {
        $role = Role::find($request->role_id);

        if($request->password_confirmation != $request->password)
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'As senhas não coincidem.');
        }

        $password = $request->get('password') ? $request->get('password') : Str::random(10);

        $data = $request->merge(['password' => Hash::make($password)])->all();

        // Autorizando usuario para api
        if($role->name == 'ADMIN' || $role->name == 'FUNCIONARIO')
        {
            $data['api_token'] = Str::random(80);
        } else
        {
            $data['api_token'] = null;
        }

        $user = $model->create($data)
                    ->assignRole($role->name);

        // try{
        //     Mail::to($user->email)
        //         ->send(new UserCreate($user->name, $user->email, $password));
        // } catch(Swift_TransportException $e)
        // {
        //     Log::debug($e->getMessage());
        // }

        return redirect()->route('admin.user.index')->with('success', 'Usuário criado com sucesso.');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = $this->usersModel->find($id);
        $userRole = $user->getRoleNames()->first();

        return view('admin.usersManagement.edit')
                ->with(compact('roles', 'user', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->usersModel->find($id);
        $userRole = $user->getRoleNames()->first();
        $hasPassword = $request->get('password');

        if($request->password_confirmation != $request->password)
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'As senhas não coincidem.');
        }

        $role = Role::find($request->role_id);

        $data = $request->merge(
            ['password' => Hash::make($request->get('password'))]
            )->except([$hasPassword ? '' : 'password']
        );

        $user->update($data);
        if($userRole)
        {
            if($userRole != $role->name || !$user->hasRole($role->name))
            {
                $user->removeRole($userRole);
                $user->assignRole($role->name);
            }
        }


        return redirect()->route('admin.user.index')
                        ->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
                ->route('admin.user.index')
                ->with('success', 'Usuário apagado com sucesso.');
    }

    public function search(Request $request)
    {
        $users = $this->usersModel->filter([
            'query' => $request->search,
            'column' => 'name'
        ],'paginate', 15);

        $size = $users->count();

        //colocando mensagens na session

        session()->forget('error');
        session()->forget('succes');
        if ($size && $size > 0)
        {
            session()->flash('success', $size.'Valores encotrados.');
        }
        else
        {
            session()->flash('erro', 'Nenhum registro encontrado.');
        }
        return view('admin.usersManagement.index')
                ->with(compact('users'));

    }
}
