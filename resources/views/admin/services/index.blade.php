@extends('layouts.app', ['activePage' => 'services', 'titlePage' => 'Serviços'])
@section('content')
<style>
    .td-actions{
        display: grid !important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Serviços') }}</h4>
                        <p class="card-service"> {{ __('Gestão de Serviços') }}</p>
                    </div>
                    <div class="card-body">

                        @if (session('success') || session('error'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-{{(session('success') ? 'success' : 'danger')}}">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="fa-solid fa-x fa-xl"></i>
                                        </button>
                                        <span>{{(session('success') ? session('success') : session('error'))}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Buscar --}}
                        <div class="row">
                            <div class="col-6 text-left">
                                <form action="{{ route('admin.services.search') }}" class="navbar-form" method="get">
                                    <div class="input-group no-border d-flex align-items-center">
                                        <input type="text" name="search" class="form-control"
                                               placeholder="Buscar pelo título do serviço...">
                                        <button type="submit" class="btn btn-white btn-round m-0 btn-just-icon">
                                            <i class="fa-solid fa-magnifying-glass fa-xs"></i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                                
                                    {{-- Cadastrar --}}
                                <div class="col-6 text-right">
                                    <a href="{{ route('admin.services.create') }}"
                                    class="btn btn-sm btn-primary">{{ __('+ Serviços') }}
                                    </a>
                                </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Título') }}
                                    </th>
                                    <th>
                                        {{ __('Cliente') }}
                                    </th>
                                    <th>
                                        {{ __('Data de registro') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Ações') }}
                                    </th>
                                </thead>
                                <tbody>
                                @if($services->count() > 0)
                                    @foreach($services as $service)
                                        <tr>
                                            <td>
                                                {{ $service->title }}
                                            </td>
                                            <td>
                                                {{ $service->client }}
                                            </td>
                                            <td>
                                                {{ $service->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="td-actions text-right" id="desgraça">
                                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('admin.services.edit', $service->id) }}" data-original-title=""
                                                    title="Atualizar serviço">
                                                        <i class="fas fa-edit fa-2x"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                
                                                    <button type="button" class="btn btn-danger btn-link"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("Você tem certeza que deseja deletar esse serviço?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="fas fa-times fa-2x"></i>
                                                    <div class="ripple-container"></div>
                                                    </button>
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


