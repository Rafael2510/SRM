@extends('layouts.app', ['activePage' => 'reports', 'titlePage' => 'Gestão de Produtos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Produtos') }}</h4>
                        <p class="card-category"> {{ __('Gestão de Produtos') }}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">{{
                                    __('Voltar para a lista') }}</a>
                            </div>
                        </div>
                        {{-- produto --}}
                        <h2 class="text-black"><strong>Produto</strong></h2>
                        <div class="row form-group">
                            {{-- Titulo --}}
                            <div class="col-4 mb-4">
                                <label class="col-12 text-black <strong>"><strong>Título</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->title }}
                                    </p>
                                </div>
                            </div>
                            {{-- Data de cadastro --}}
                            <div class="col-4 mb-4">
                                <label for="" class="col-12 text-black"><strong>Data de cadastro</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                            {{-- usuario --}}
                            <div class="col-4 mb-4">
                                <label for="" class="col-12 text-black"><strong>Criado por</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->user->name }}
                                    </p>
                                </div>
                            </div>

                            {{-- categoria --}}
                            <div class="col-4 mb-4">
                                <label class="col-12 text-black"><strong>Categoria</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->category ? $products->category->title : 'Categoria indefinida' }}
                                    </p>
                                </div>
                            </div>
                            
                            {{-- medida --}}
                            <div class="col-4 mb-4">
                                <label class="col-12 text-black"><strong>Medida</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->measure ? $products->measure : 'Medida indefinida' }}
                                    </p>
                                </div>
                            </div>

                            {{-- valor --}}
                            <div class="col-4 mb-4">
                                <label class="col-12 text-black"><strong>Valor</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->value }}
                                    </p>
                                </div>
                            </div>
                            {{-- valor --}}
                            <div class="col-4 mb-4">
                                <label class="col-12 text-black"><strong>Valor</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->amount }}
                                    </p>
                                </div>
                            </div>
                            {{-- Descrição --}}
                            <div class="col-12 mb-4">
                                <label for="" class="col-12 text-black"><strong>Descrição</strong></label>
                                <div class="col-12">
                                    <p>
                                        {{ $products->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection