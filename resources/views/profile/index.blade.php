@extends('components.profile')
@section('content.profile')
    <div class="container pt-3">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-center">
                            
                            <img src="{{ $user->avatar ? (str_contains($user->avatar, 'https://') ? 'data:image/jpg' . ';base64,' . base64_encode(file_get_contents($user->avatar)) : asset('storage' . $user->avatar)) : Avatar::create($user->name)->toBase64() }}" alt="" class="img-fluid rounded-circle float-center w-50">
                            <h3 class="mt-3">
                                {{$user->name}}
                            </h3>

                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                div.form-group>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
