@extends('layouts.app', ['activePage' => 'history', 'titlePage' => 'Historico'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <ul class="nav nav-pills mb-3 mx-lg-3" id="pills-tab" role="tablist">
            {{-- All --}}
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-allProducts" data-toggle="pill" href="#allProducts"
                    role="tab" aria-controls="pills-general" aria-selected="true">Vendas</a>
            </li>
            {{-- Active --}}
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-productsPromotion" data-toggle="pill" href="#productsPromotion"
                    role="tab" aria-controls="pills-gateway" aria-selected="true">Serviços</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            {{-- All --}}
            <div class="tab-pane fade show active" id="allProducts" role="tabpanel"
                aria-labelledby="settings-email">
                @include('admin.history.product')
            </div>
            {{-- Active --}}
            <div class="tab-pane fade" id="productsPromotion" role="tabpanel"
                aria-labelledby="productsPromotion">
                @include('admin.history.service')
            </div>
        </div>
    </div>
</div>
@endsection
