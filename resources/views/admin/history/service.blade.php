<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

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
                                    @if($serviceHistory->count() > 0)
                                    @foreach($serviceHistory as $service)
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