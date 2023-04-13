@extends('components.profile')
@section('content.profile')
    <div class="row justify-content-center">
        <div class="col-12">
            {!! Form::open([
                'route' => ['complete-registration.update', $user->id],
                'method' => 'put',
                'autocomplete' => 'false',
                'enctype' => 'multipart/form-data',
            ]) !!}
            <div class="card p-3">
                <div class="card-body ">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-4 col-sm-12 py-3">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ $user->avatar ? (str_contains($user->avatar, 'https://') ? 'data:image/jpg' . ';base64,' . base64_encode(file_get_contents($user->avatar)) : asset('storage' . $user->avatar)) : Avatar::create($user->name)->toBase64() }}"
                                        alt="" class="img-fluid rounded-circle float-center w-50">
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-12">
    
                                        <div class="form-group mt-3">
                                            {!! Form::file(
                                                'avatar',
                                                $errors->has('avatar')
                                                    ? ['class' => 'form-control is-invalid', 'accept' => 'image/*']
                                                    : ['class' => 'form-control border ', 'accept' => 'image/png, image/*'],
                                            ) !!}
                                            {!! $errors->first('role_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-capitalize text-center">
                                        <h3>{{ $user->name }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 py-3">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1>
                                                Complete your Registration
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('role_id', 'Select Role') !!}
                                                {!! Form::select('role_id[]', $role, @$user->getRoleNames(), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Select Level',
                                                    'id' => 'role_id',
                                                ]) !!}
                                                {!! $errors->first('role_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group mt-3">
                                                {!! Form::label('username', 'Username*') !!}
                                                {!! Form::text(
                                                    'username',
                                                    @$user->username,
                                                    $errors->has('username') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('username', '<p class="help-block invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group mt-3">
                                                {!! Form::label('email', 'Email') !!}
                                                {!! Form::text(
                                                    'email',
                                                    @$user->email,
                                                    $errors->has('email') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control', 'readonly'],
                                                ) !!}
                                                {!! $errors->first('email', '<p class="help-block invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group mt-3">
                                                {!! Form::label('password', 'Password*') !!}
                                                {!! Form::text(
                                                    'password',
                                                    null,
                                                    $errors->has('password') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('password', '<p class="help-block invalid-feedback">:message</p>') !!}
                                            </div>
                                        </div>
    
    
                                    </div>
                                </div>
                                <div class="box-footer">
                                    {!! Form::submit(isset($user) ? 'Update' : 'Save', ['class' => 'btn btn-primary mt-3 w-100', 'id' => 'save']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
