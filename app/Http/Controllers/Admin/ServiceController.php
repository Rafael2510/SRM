<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    protected $serviceModel;
    protected $helperController;

    public function __construct(Service $serviceModel, HelperController $helperController)
    {
        $this->serviceModel = $serviceModel;
        $this->helperController = $helperController;
    }

    public function index()
    {
        $services = $this->serviceModel->getAll('paginate', 15);
        return view('admin.services.index')
               -> with(compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $serviceCreate = $request->all();
        $serviceCreate['user_id'] = Auth::user()->id;

        $this->serviceModel->create($serviceCreate);

        return redirect()
                ->route('admin.services.index')
                ->with('success', 'Serviço adicionado com sucesso!');
    }

    public function edit($id)
    {
        $service = $this->serviceModel->find($id);

        if (!$service)
        {
            return redirect()
                ->route('admin.services.index')
                ->with('error', 'Serviço  não encontrado!');
        }

        return view('admin.services.edit')
                ->with(compact('category'));
    }

    public function update(Request $request, $id)
    {
        $service = $this->serviceModel->find($id);
        $serviceUpdate = $request->all();
        $serviceUpdate['user_id'] = Auth::user()->id;

       

        if(!$service)
        {
            return redirect()
                ->route('admin.services.index')
                ->with('error', 'Erro ao atualizar Serviço!');
        }

        $service->update($serviceUpdate);

        return redirect()
                ->route('admin.services.index')
                ->with('success', 'Serviço atualizado com sucesso!');

    }

    public function destroy($id)
    {
        $service = $this->serviceModel->find($id);

        if(!$service)
        {
            return redirect()->route('admin.services.index');
        }

        $service->delete();

        return redirect()
                ->route('admin.services.index')
                ->with('success', 'Serviço deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $services = $this->serviceModel->filter([
            'query' => $request->search,
            'column' => 'title'
        ],'paginate', 15);

        $size = $services->count();

        // Colocando mensagens na session
        session()->forget('error');
        session()->forget('success');
        if ($size && $size > 0 )
        {
            session()->flash('success', $size.' valores econtrados.');

        } else
        {
            session()->flash('error', 'Nenhum registro encontrado.');
        }

        return view('admin.services.index')
                ->with(compact('services'));
    }
}
