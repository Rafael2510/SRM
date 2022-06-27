<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                                <form action="{{ route('admin.products.search') }}" class="navbar-form" method="get">
                                    <div class="input-group no-border d-flex align-items-center">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Buscar pelo título do produto...">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">Procurar</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            {{-- Cadastrar --}}
                            <div class="col-6 text-right">
                                <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">{{ __('+
                                    Produto') }}
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
                                        {{ __('Categoria') }}
                                    </th>
                                    <th>
                                        {{__('Medida')}}
                                    </th>
                                    <th>
                                        {{ __('Data de registro') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Ações') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @if($products->count() > 0)
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->title }}
                                        </td>
                                        <td>
                                            {{ $product->category ? $product->category->title : 'Categoria indefinida'
                                            }}
                                        </td>
                                        <td>
                                            {{ $product->measure }}
                                        </td>
                                        <td>
                                            {{ $product->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')

                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('admin.products.sell', $product->id) }}" data-original-title=""
                                                    title="Vender produto">
                                                        <i class="fas fa-edit fa-2x"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('admin.products.show', $product->id) }}"
                                                    data-original-title="" title="Detalhes">
                                                    <i class="fas fa-archive fa-2x"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('admin.products.edit', $product->id) }}"
                                                    data-original-title="" title="Atualizar produto">
                                                    <i class="fas fa-edit fa-2x"></i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                               
                                                <button type="button" class="btn btn-danger btn-link"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("Você tem certeza que deseja deletar esse produto?") }}') ? this.parentElement.submit() : ''">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
{{-- @endcan --}}