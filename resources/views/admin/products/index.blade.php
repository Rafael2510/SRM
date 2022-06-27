@extends('layouts.app', ['activePage' => 'products', 'titlePage' => 'Produtos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="tab-content" id="pills-tabContent">
            {{-- All --}}
            <div class="tab-pane fade show active" id="allProducts" role="tabpanel"
                aria-labelledby="settings-email">
                @include('admin.products.all')
            </div>
            
        </div>
    </div>
</div>
@endsection
