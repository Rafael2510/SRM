{{-- @can('view') --}}
@extends('layouts.app', ['activePage' => 'users', 'titlePage' => 'Usuários'])
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Usuários') }}</h4>
                        <p class="card-category"> {{ __('Gestão de usuários') }}</p>
                    </div>
                    <div class="card-body">

                        @if (session('success') || session('error'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-{{(session('success') ? 'success' : 'danger')}}">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{(session('success') ? session('success') : session('error'))}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Buscar --}}
                        <div class="row">
                            <div class="col-6 text-left">
                                <form action="{{ route('admin.user.search') }}" class="navbar-form" method="get">
                                    <div class="input-group no-border d-flex align-items-center">
                                        <input type="text" name="search" class="form-control"
                                               placeholder="Buscar pelo nome do usuário...">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            {{-- @role('ADMIN') --}}
                            {{-- @can('create') --}}
                                {{-- Cadastrar --}}
                                <div class="col-6 text-right">
                                <a href="{{ route('admin.user.create') }}"
                                   class="btn btn-sm btn-primary">{{ __('+ Usuário') }}
                                </a>
                                </div>
                            {{-- @endcan --}}
                            {{-- @endrole('ADMIN') --}}
                           
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Nome') }}
                                    </th>
                                    <th>
                                        {{ __('E-mail') }}
                                    </th>
                                    <th>
                                        {{ __('Data de registro') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Ações') }}
                                    </th>
                                </thead>
                                <tbody>
                                @if($users->count() > 0)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    {{-- @role('ADMIN') --}}
                                                    {{-- @can('edit') --}}
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('admin.user.edit', $user->id) }}" data-original-title=""
                                                    title="Atualizar usuário">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>  
                                                    {{-- @endcan --}}
                                                    
                                                    {{-- @can('remove') --}}
                                                        <button type="button" class="btn btn-danger btn-link"
                                                            data-original-title="" title=""
                                                            onclick="confirm('{{ __("Você tem certeza que deseja deletar esse usuário?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>    
                                                    {{-- @endcan --}}
                                                    {{-- @endrole --}}
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
                                {{-- {{ $users->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
{{-- @endcan --}}
