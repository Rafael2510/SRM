<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController;
use App\Http\Controllers\Helper\UploadController;
use App\Models\Measures;
use App\Models\Sell;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductsController extends Controller
{
    protected $productsModel;
    protected $categoriesModel;
    protected $uploadController;
    protected $helperController;
    protected $sellModel;

    public function __construct(
        Products $productsModel,Categories $categoriesModel, 
        UploadController $uploadController,HelperController $helperController, 
        Sell $sellModel)
    {
        $this->productsModel      = $productsModel;
        $this->categoriesModel    = $categoriesModel;
        $this->uploadController   = $uploadController;
        $this->helperController   = $helperController;
        $this->sellModel          = $sellModel;
    }

    public function index()
    {
        $products = $this->productsModel->getAll('paginate', 15);
        return view('admin.products.index')
                ->with(compact('products'));

    }

    public function create()
    {
        $categories = $this->categoriesModel->getAll();
        return view('admin.products.create')
                ->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        Products::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'produto criado com sucesso!');
        
    }

    public function edit($id, Request $request)
    {
        $product = $this->productsModel->find($id);
        $categories = $this->categoriesModel->getAll();
        if(!$product)
        {
            return redirect()
                    ->route('admin.products.index')
                    ->with('error', 'Produto não encontrado');
        }

        return view('admin.products.edit')
                ->with(compact('product', 'categories'));
    }

    public function update(Request $request, $id)
   {
        $productUpdate               = $request->all();
        $product                     = $this->productsModel->find($id);
        dd($productUpdate);
       
        $product->update($productUpdate);

        return redirect()
                ->route('admin.products.index')
                ->with('success', 'produto atualizado com sucesso!');
   }

   public function show($id, Request $request)
    {
        $products = $this->productsModel->find($id);
        $categories = $this->categoriesModel->getAll();
        
        if (!$products)
        {
            return redirect()
                    ->back()
                    ->with('error', 'Produto não encontrado.');
        }

        return view('admin.products.detail')
                ->with(compact('products', 'categories'));
    }

   public function destroy($id)
   {    
        $product = $this->productsModel;
        $productDelete = $this->productsModel->find($id);
        if(!$productDelete = $this->productsModel->find($id))
        {
            return redirect()
            ->route('admin.products.index')
            ->with('error', 'Produto não encontrado');
        }
            
        $productDelete->delete();
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produto deletado com sucesso');
   }

   public function search(Request $request)
   {
        $products = $this->productsModel->filter([
            'query' => $request->search,
            'column' => 'title',
            'paginate', 15
        ]);

        $size = $products->count();

        //colocando mensagens na session
        session()->forget('error');
        session()->forget('success');

        if($size && $size > 0)
        {
            session()->flash('success', $size. 'Valores encontrados.');
        } else
        {
            session()->flash('error', 'Nenhum registro encontrado');
        }

        return view('admin.products.index')
            ->with(compact('products'));
   }

   public function sell($id)
   {
        $product =  $this->productsModel->find($id);
        // dd($product);
        return view('admin.products.sell')
                ->with(compact('product'));
   }

   public function storeSell(Request $request)
   {
        $sell = $request->all();
        $sell['user_id'] = Auth::user()->id;
        // dd($sell);
        
        Sell::create($sell);
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'venda realizada com sucesso!');
   }
}









