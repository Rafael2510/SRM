@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Administração de Usuários')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @include('layouts.partials.alert-messages')
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.user.update', $user->id) }}" autocomplete="off"
                          class="form-horizontal"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Atualizar usuário') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('admin.user.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Voltar para a lista') }}</a>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{$errors->first()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- Nome --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="name" id="input-title" type="text"
                                                   placeholder="{{ __('Nome do usúario') }}"
                                                   value="{{ old('name') ? old('name') : $user->name }}" />
                                        </div>
                                    </div>
                                </div>
                                {{-- E-mail --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('E-mail') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                name="email" id="input-email" type="text"
                                                placeholder="{{ __('E-mail do usúario') }}"
                                                value="{{ old('email') ? old('email') : $user->email }}" />
                                        </div>
                                    </div>
                                </div>
                                {{-- Tipo --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tipo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="custom-select" name="role_id" id="input-role_id"
                                                    required="true" aria-required="true">
                                                <option value="" disabled selected>Tipo de usuário</option>
                                                @foreach($roles as $role)
                                                    <option class="text-dark" {{ old('role_id') == $role->id || $role->name == $userRole ? 'selected' : '' }} value="{{$role->id}}">{{$role->name}}</option> {{-- userRole --}}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- Senha --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                            for="input-password">{{ __('Senha') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                input type="password"
                                                name="password" id="input-password" type="text"
                                                placeholder="{{ __('Nova senha') }}"
                                                value="" />
                                        </div>
                                    </div>
                                </div>
                                {{-- Confirmar Senha --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                            for="input-password">{{ __('Confirmar Senha') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                input type="password"
                                                name="password_confirmation" id="input-password" type="text"
                                                placeholder="{{ __('Confirmar nova senha') }}"
                                                value="" />
                                         </div>
                                     </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Atualizar usuário') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
