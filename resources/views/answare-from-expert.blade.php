@extends('layouts.master')
@section('content')
<div class="container pt-2">
    <section id="question" class="">
        <div class="d-flex justify-content-center h-100">
            <div class="col-md-11 col-sm-12 align-self-center">
                <x-list-question-by-level/>
                
            </div>
        </div>
    </section>
</div>
@stop