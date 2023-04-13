@extends('layouts.master')
@section('content')
<section class="container-fluid p-0">
    <div class="d-flex" id="wrapper" style="padding: 100px 0 0 0;">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light" style="height: 50px"><img src="{{ $user->avatar ? (str_contains($user->avatar, 'https://') ? 'data:image/jpg' . ';base64,' . base64_encode(file_get_contents($user->avatar)) : asset('storage' . $user->avatar)) : Avatar::create($user->name)->toBase64() }}"
                alt="" class="img-fluid rounded-circle " style="height:25px;"> {{$user->name}}</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Progress</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Logout</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="w-100"style="height: 50px">
                <div class="container-fluid">
                    <button class="btn" id="sidebarToggle"> <i class="bi bi-list"></i></button>
                    
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid py-3">

                @yield('content.profile')
            </div>
        </div>
    </div>
</section>
@endsection
