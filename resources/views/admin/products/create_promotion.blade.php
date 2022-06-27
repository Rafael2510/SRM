@extends('layouts.app', ['activePage' => 'promo', 'titlePage' => __('Administração de promoções')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            @include('layouts.partials.alert-messages')
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.products.store.promo') }}" autocomplete="off"
                          class="form-horizontal"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Adicionar nova promoção') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('admin.products.index') }}"
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
                                    <label class="col-sm-2 col-form-label">{{ __('Produto: ') }}</label>
                                    <div class="col-sm-7 d-flex">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="title" id="input-title" type="text"
                                                   placeholder="{{ __('Título do produto') }}"
                                                   value="{{ $product->title }}" disabled>
                                        </div>
                                        <div class="form-group px-3">
                                            @foreach ($product->measures as $measure)
                                            <input type="radio" id="{{ $measure }}" name="measure" value="{{ $measure }}" hidden>
                                            <label for="{{ $measure }}" class="bg-primary text-white px-5 py-2 measure-btn" style="cursor: pointer;border-radius: 5px" onClick="(function(){
                                                classList.add('clicked')
                                            })()">{{ $measure }}</label>
                                            {{-- measure --}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- {{ dd($product) }} --}}                               
                                {{-- Valor prod --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Valor do produto') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="value" id="input-value" type="text"
                                                   placeholder="{{ __('Valor do produto') }}"
                                                   value="{{ old('value') ? old('value') : '' }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Valor promo --}}
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Valor em promoção') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="new_value" id="input-new-value" type="text"
                                                   placeholder="{{ __('Valor em promoção') }}"
                                                   value="{{ old('new_value') ? old('new_value') : '' }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- define como promoção --}}
                                <input type="hidden" name="featured"  value="1"  />
                                                
                                <input type="hidden" name="product_id" value="{{ $product->id }}">           
                                <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Adicionar promoção') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

