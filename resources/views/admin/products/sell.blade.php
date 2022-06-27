@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Venda de produtos')])

@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/Css" />
<style type="text/Css">
    .unity-select
        {
            position: absolute;
            width: 40%;
            height: 100%;
            top: 0;
            right: 0;
            Z-index: 999;
        }

        .unity-select select
        {
            padding: 0 !important;
            border-radius: 0 .5rem .5rem 0
        }

        .quantity::-webkit-inner-spin-button
        {
            -webkit-appearance: none;
        }

        .quantity
        {
            -moz-appearance: textfield;
            appearance: textfield;

        }
    </style>
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('layouts.partials.alert-messages')
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('admin.products.sell.store') }}" autocomplete="off"
                    class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Vender produto') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">{{
                                        __('Voltar para a lista') }}</a>
                                </div>
                            </div>

                            @if ($errors->any())
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="fa-solid fa-x fa-xl"></i>
                                        </button>
                                        <span>{{$errors->first()}}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- Titulo --}}
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Título') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control" name="title" id="input-title" type="text"
                                            placeholder="{{ __('Título do produto') }}" value="{{ $product->title }}"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                            {{-- medidas --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Medida') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="measure" placeholder="Medida do produto" name="measure" value="{{$product->measure}}" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        {{-- valor --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="measure" name="value" placeholder="Valor do produto" value="{{$product->value}}" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        {{-- estoque --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Em estoque') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="amount" name="amount" placeholder="quantidade do produto em estoque" value="{{ $product->amount }}" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        
                        {{-- qtd vendida --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Quantidade vendida') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="amount" name="sell_amount" placeholder="quantidade do produto vendida"  type="text" >
                                </div>
                            </div>
                        </div>
                        {{-- nome cliente --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Nome do cliente') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="amount" name="client" placeholder="Nome do cliente"  type="text" >
                                </div>
                            </div>
                        </div>
                        {{-- cpf cliente --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('cpf do cliente') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="amount" name="cpf_client" placeholder="cpf do cliente"  type="text" >
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <div class="ml-auto mr-auto m-5">
                            <button type="submit" class="btn btn-primary">{{ __('vender produto') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
{{-- @push('scripts') --}}
<script type="text/Javascript">

    changeImage();
    function changeImage(element)
        {
            let allInputFiles = document.querySelectorAll('#image');
            console.log(allInputFiles)
            allInputFiles.forEach(element => {
                element.addEventListener('change', function()
                    {
                        if (this.files && this.files[0])
                        {
                            let image = document.getElementById(this.dataset.imageId);
                            console.log(image);
                            image.setAttribute('src', URL.createObjectURL(this.files[0]))
                        }
                    });
                });
            }
    </script>
{{-- @endpush --}}