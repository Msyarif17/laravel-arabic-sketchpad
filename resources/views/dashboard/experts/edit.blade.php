<!-- Button trigger modal -->
<button type="button" onclick="edit({{$quest->id}})" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#edit-{{$quest->id}}">
    <i class="fa-solid fa-pencil"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="edit-{{$quest->id}}" tabindex="-1" aria-labelledby="edit-{{$quest->id}}-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        {!! Form::open([
            'route' => ['dashboard.questions.update',$quest->id],
            'method' => 'put',
            'autocomplete' => 'false',
            'enctype' => 'multipart/form-data',
        ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-{{$quest->id}}-label">Edit Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('dashboard.questions._form')
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
