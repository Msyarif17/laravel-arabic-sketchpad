<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalData">
    {{$actionName}}
</button>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        {!! Form::open([
            'route' => 'dashboard.make-questions.store',
            'method' => 'post',
            'autocomplete' => 'false',
            'enctype' => 'multipart/form-data',
        ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDataLabel">{{$actionName}} {{$name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-dashboard.make-questions name="{{$name}}" action-name="{{$actionName}}" create-url="{{$createUrl}}"/>
            </div>
            <div class="modal-footer">
                <div class="box-footer">
                    {!! Form::submit(isset($data) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
