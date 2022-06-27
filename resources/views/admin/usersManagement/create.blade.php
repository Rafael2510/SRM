@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Administração de usuários')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @include('layouts.partials.alert-messages')
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.user.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Adicionar novo usuário') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('admin.user.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Voltar para a lista') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="input-name" type="text"
                                                   placeholder="{{ __('Nome') }}" value="{{ old('name') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('E-mail') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('E-mail') }}" value="{{ old('email') }}"
                                                   required/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tipo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="custom-select" name="role_id" id="input-role_id"
                                                    required="true" aria-required="true">
                                                <option value="" disabled selected>Tipo de usuário</option>
                                                @foreach($roles as $role)
                                                    <option class="text-dark" {{ old('role_id') == $role->id ? 'selected' : '' }} value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-password">{{ __(' Senha') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                input type="password" name="password" id="input-password"
                                                placeholder="{{ __('Senha') }}" value=""/>
                                            @if ($errors->has('password'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                           for="input-password-confirmation">{{ __('Confirme sua senha') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password_confirmation"
                                                   id="input-password-confirmation" type="password"
                                                   placeholder="{{ __('Confirme sua senha') }}" value=""/>
                                        </div>
                                    </div>
                                    <div class="error-message col-12">
                                        <strong></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Adicionar usuário') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
