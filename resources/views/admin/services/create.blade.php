@extends('layouts.app', ['activePage' => 'services', 'titlePage' => __('Administração de serviços')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.services.store') }}" autocomplete="off"
                          class="form-horizontal"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Adicionar novo serviço') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('admin.services.index') }}"
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
                                                   placeholder="{{ __('Título do serviço') }}"
                                                   value="{{ old('title') }}" />
                                        </div>
                                    </div>
                                </div>
                                {{-- cliente --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('cliente') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="client" id="input-title" type="text"
                                                   placeholder="{{ __('Nome do cliente') }}"
                                                   value="{{ old('title') }}" />
                                        </div>
                                    </div>
                                </div>
                                {{-- cpf cliente --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('cliente') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="cpf_client" id="input-title" type="text"
                                                   placeholder="{{ __('CPF do cliente') }}"
                                                   value="{{ old('title') }}" />
                                        </div>
                                    </div>
                                </div>
                                {{-- valor --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Valor') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="value" id="input-title" type="text"
                                                   placeholder="{{ __('Valor do serviço') }}"
                                                   value="{{ old('title') }}" />
                                        </div>
                                    </div>
                                </div>

                                {{-- descrição --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('descrição') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="description" id="input-title" type="text"
                                                   placeholder="{{ __('Descrição do serviço') }}"
                                                   value="{{ old('title') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Adicionar Serviço') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection