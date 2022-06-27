@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => 'Categorias'])
@section('content')
<style>
    .td-actions
    {
        display: grid !important;
        justify-content: end !important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Categorias') }}</h4>
                        <p class="card-category"> {{ __('Gestão de Categorias') }}</p>
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
                                <form action="{{ route('admin.categories.search') }}" class="navbar-form" method="get">
                                    <div class="input-group no-border d-flex align-items-center">
                                        <input type="text" name="search" class="form-control"
                                               placeholder="Buscar pelo título da categoria...">
                                        <button type="submit" class="btn btn-white btn-round m-0 btn-just-icon">
                                            <i class="fa-solid fa-magnifying-glass fa-xs"></i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                                
                                    {{-- Cadastrar --}}
                                <div class="col-6 text-right">
                                    <a href="{{ route('admin.categories.create') }}"
                                    class="btn btn-sm btn-primary">{{ __('+ Categoria') }}
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
                                        {{ __('Data de registro') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Ações') }}
                                    </th>
                                </thead>
                                <tbody>
                                @if($categories->count() > 0)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                {{ $category->title }}
                                            </td>
                                            <td>
                                                {{ $category->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="td-actions text-right" id="desgraça">
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('admin.categories.edit', $category->id) }}" data-original-title=""
                                                    title="Atualizar categoria">
                                                        <i class="fas fa-edit fa-2x"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                
                                                    <button type="button" class="btn btn-danger btn-link"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("Você tem certeza que deseja deletar essa categoria?") }}') ? this.parentElement.submit() : ''">
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
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


