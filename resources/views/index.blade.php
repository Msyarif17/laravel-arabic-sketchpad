@extends('layouts.master')
@section('content')
<div class="container pt-2">
    <section id="question" class="">
        <div class="d-flex justify-content-center h-100">
            <div class="col-md-10 col-sm-12 align-self-center">
                
                <div class="card">
                    <div class="card-body">
                        <div class="text-center fw-bold">
                            <x-question/>
                        </div>
                        <div class="mx-auto">
                            <x-image-question/>
                        </div>
                        <x-sketch-pad/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop