<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('title', 'Question*') !!}
                {!! Form::text(
                    'question',
                    @$data->question,
                    $errors->has('title') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('title', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('image_question', 'Question For Image') !!}
                <textarea class="form-control input" name="image_question">{!! old('content', @$data->image_question) !!}</textarea>
                {!! $errors->first('content', '<p class="help-block invalid-feedback">:message</p>') !!}
                <div class="simple-keyboard"></div>
            </div>
        </div>



    </div>
</div>
<!-- /.box-body -->


@push('js')
    
@endpush
