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

                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('Título') }}
                                    </th>
                                    <th>
                                        {{ __('cliente') }}
                                    </th>
                                    <th>
                                        {{ __('Data de registro') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Ações') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @if($productHistory->count() > 0)
                                    @foreach($productHistory as $product)
                                    <tr>
                                        <td>
                                            {{ $product->product->id }}
                                        </td>
                                        <td>
                                            {{ $product->client}}
                                        </td>
                                        <td>
                                            
                                            {{ $product->created_at->format('d/m/Y') }}
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