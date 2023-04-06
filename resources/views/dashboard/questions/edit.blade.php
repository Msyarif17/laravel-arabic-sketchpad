<!-- Button trigger modal -->
<button type="button" onclick="edit({{$quest->id}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        {!! Form::open([
            'route' => ['dashboard.questions.update',$quest->id],
            'method' => 'put',
            'autocomplete' => 'false',
            'enctype' => 'multipart/form-data',
        ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('dashboard.questions._form')
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
