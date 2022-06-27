@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('Administração de Categorias')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.categories.store') }}" autocomplete="off"
                          class="form-horizontal"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Adicionar nova categoria') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('admin.categories.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Voltar para a lista') }}</a>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
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
                                            <input class="form-control"
                                                   name="title" id="input-title" type="text"
                                                   placeholder="{{ __('Título da categoria') }}"
                                                   value="{{ old('title') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Adicionar Categoria') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection