@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Administração de produtos')])

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
                <form method="post" action="{{ route('admin.products.store') }}" autocomplete="off"
                    class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Adicionar novo produto') }}</h4>
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
                                            placeholder="{{ __('Título do produto') }}" value="{{ old('title') }}"
                                            required />
                                    </div>
                                </div>
                            </div>
                            {{-- Categoria --}}
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Categoria') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control" name="category_id" id="input-category" required>
                                            <option value=""> Categoria do Produto</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{ old('category_id')==$category->id ?
                                                'selected' : '' }}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- medidas --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Medida') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="measure" placeholder="Medida do produto" name="measure" type="text">
                                </div>
                            </div>
                        </div>
                        {{-- valor --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="measure" name="value" placeholder="Valor do produto" type="text">
                                </div>
                            </div>
                        </div>
                        {{-- estoque --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Em estoque') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" id="amount" name="amount" placeholder="quantidade do produto em estoque" type="text">
                                </div>
                            </div>
                        </div>
                        {{-- Descricao --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Descrição') }}</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <textarea class="form-control input-content" name="description"
                                        id="input-description" type="text"
                                        placeholder="{{ __('Descrição') }}">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        
                        <div class="ml-auto mr-auto m-5">
                            <button type="submit" class="btn btn-primary">{{ __('Adicionar produto') }}</button>
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