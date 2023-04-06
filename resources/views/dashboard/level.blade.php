@extends('layouts.dashboard')
@section('css')
{{-- code --}}
@endsection
@section('content')
<x-dashboard.datatable.level name="{{$data['name']}}" create-url="{{$data['create_url']}}" action-name="create"/>
@endsection
@push('scripts')

@endpush