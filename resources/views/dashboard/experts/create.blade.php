<!-- Button trigger modal -->
<button type="button" onclick="create()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
    Create
</button>

<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        {!! Form::open([
            'route' => 'dashboard.experts.store',
            'method' => 'post',
            'autocomplete' => 'false',
            'enctype' => 'multipart/form-data',
        ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Create Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('dashboard.experts._form')
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
