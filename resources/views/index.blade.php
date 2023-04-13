@extends('layouts.master')
@section('content')


@include('components.hero')
    @include('components.featured-services')
    @include('components.about-us')
    @include('components.leader-board')
    @include('components.tecnology')
@stop
