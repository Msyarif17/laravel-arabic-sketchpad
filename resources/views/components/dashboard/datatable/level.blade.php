<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <h3>{{$name}}</h3>
                </div>
                <div class="align-self-center">
                    
                    <x-dashboard.modal name="{{$name}}" action-name="{{$actionName}}" create-url="{{$createUrl}}"/>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@section('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection
