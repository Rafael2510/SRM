<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoriesModel;
    protected $helperController;

    public function __construct(Categories $categoriesModel, HelperController $helperController)
    {
        $this->categoriesModel = $categoriesModel;
        $this->helperController = $helperController;
    }

    public function index()
    {
        $categories = $this->categoriesModel->getAll('paginate', 15);
        return view('admin.categories.index')
               -> with(compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $categoryCreate = $request->all();
        $slug = $this->helperController->sanitizeString($categoryCreate['title']);
        $slug = $this->categoriesModel->slugVerify($slug);
        $categoryCreate['slug'] = $slug;

        $this->categoriesModel->create($categoryCreate);

        return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Categoria adicionada com sucesso!');
    }

    public function edit($id)
    {
        $category = $this->categoriesModel->find($id);

        if (!$category)
        {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Categoria  não encontrada!');
        }

        return view('admin.categories.edit')
                ->with(compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoriesModel->find($id);
        $categoryUpdate = $request->all();

        $slug = $this->helperController->sanitizeString($categoryUpdate['title']);
        $slug = $this->categoriesModel->slugVerify($slug);

        $categoryUpdate['slug'] = $slug;

        if(!$category)
        {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Erro ao atualizar categoria!');
        }

        $category->update($categoryUpdate);

        return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Categoria atualizada com sucesso!');

    }

    public function destroy($id)
    {
        $category = $this->categoriesModel->find($id);

        if(!$category)
        {
            return redirect()->route('admin.categories.index');
        }

        $category->delete();

        return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Categoria deletada com sucesso!');
    }

    public function search(Request $request)
    {
        $categories = $this->categoriesModel->filter([
            'query' => $request->search,
            'column' => 'title'
        ],'paginate', 15);

        $size = $categories->count();

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

        return view('admin.categories.index')
                ->with(compact('categories'));
    }
}

