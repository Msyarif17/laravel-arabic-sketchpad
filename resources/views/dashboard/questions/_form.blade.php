<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('level_id', 'Level') !!}
                {!! Form::select(
                    'level_id[]',
                    $level,
                    @$quest->level,
                    ['class' => 'form-control', 'placeholder' => 'Select Level'],
                ) !!}
                {!! $errors->first('level_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('title', 'Question*') !!}
                {!! Form::text(
                    'question',
                    @$quest->question,
                    $errors->has('title') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('title', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('image_question', 'Question For Image') !!}
                <textarea class="form-control input" name="image_question">{!! old('content', @$quest->image_question) !!}</textarea>
                {!! $errors->first('content', '<p class="help-block invalid-feedback">:message</p>') !!}
                <div class="simple-keyboard"></div>
            </div>
        </div>
        
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($quest) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
    
@endpush
