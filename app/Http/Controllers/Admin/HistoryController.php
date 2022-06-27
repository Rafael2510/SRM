<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Sell;
use App\Models\Service;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    protected $sellModel;
    protected $serviceModel;

    public function __construct(Sell $sellModel, Service $serviceModel)
    {
        $this->sellModel = $sellModel;
        $this->serviceModel = $serviceModel;
    }
    public function index()
    {
        $productHistory = $this->sellModel->getAll();
        $serviceHistory = $this->serviceModel->getAll();
        return view('admin.history.index')
                ->with(compact('productHistory', 'serviceHistory'));

    }
}
