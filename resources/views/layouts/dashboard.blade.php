@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="Dashboard Ngaji">
    <meta name="author" content="{{env('APP_NAME')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('assets/image/logo.png') }}">
    <meta name="description" content="Game menulis arab adalah sebuah permainan yang menantang dan mengasyikkan, di mana kamu bisa belajar menulis huruf Arab dengan cara yang menyenangkan. Dalam game ini, kamu akan diajak untuk mengasah keterampilan menulis huruf Arab dengan cepat dan akurat, sehingga kamu bisa menjadi lebih terampil dalam membaca dan menulis bahasa Arab. Tidak hanya itu, game menulis arab juga menawarkan berbagai level yang semakin sulit, sehingga kamu bisa terus meningkatkan kemampuan menulis Arab-mu seiring dengan semakin tingginya level yang kamu mainkan. Selain itu, game ini juga dilengkapi dengan grafis yang menarik dan fitur-fitur yang seru, sehingga membuatmu betah bermain dan terus mencoba hingga berhasil menyelesaikan level-level yang ada. Dengan game menulis arab, kamu bisa mengasah keterampilan menulis bahasa Arab secara interaktif dan menyenangkan, tanpa perlu mengeluarkan biaya yang mahal untuk kursus atau bimbingan. Jadi, tunggu apalagi? Ayo mainkan game menulis arab sekarang juga dan jadilah ahli dalam menulis huruf Arab!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}"/>
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/image/logo.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/image/logo.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/image/logo.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/image/logo.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/image/logo.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/image/logo.png') }}">
{{-- <link rel="manifest" href="{{ asset('favicons/manifest.json') }}"> --}}
    <script src="{{ asset('assets/js/confetti.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .bg-nav {
            background: #685cb8 !important;
        }


        .nav-header,
        .nav-item>.nav-link {
            color: #000 !important;
        }

        .nav-item>.nav-link.active {
            background: #685cb8 !important;
            color: white !important;
        }

        .brand-text {
            text-decoration: none;
            font-weight: 1000px;
            color: #000000 !important;
        }

        .color-fix {
            background-color: #E3CCAE;
        }

        .logo-dashboard {
            font-size: 100px;
            color: rgba(255, 255, 255, 0.5);
            margin-right: -30px;
            margin-bottom: -30px;

        }
    </style>
    @stack('style')
@stop


@section('content')

@stop


@section('js')

    <script src="https://cdn.jsdelivr.net/npm/simple-keyboard@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-keyboard-layouts@latest"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- <script>
        $(".brand-link").addClass("d-flex justify-content-center text-decoration-none");
        var dateToday = new Date();

        $(".select2").select2({
            width: '100%'
        });
        $('.datepicker').daterangepicker({
            //autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD HH:mm:SS',
            },
            timePicker: true,
            minDate: "-7d"
        });
        $('.datepicker-no-limit').daterangepicker({
            //autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD',
            }
        });
        $('.datetimepicker-no-limit').daterangepicker({
            //autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD hh:ii',
            },
            timePicker: true

        });
        $('.datetimepicker').daterangepicker({
            //autoclose: true,
            "singleDatePicker": true,
            locale: {
                format: 'YYYY-MM-DD hh:ii',
            },
            timePicker: true,
            startDate: "-7d"

        });

        $(".delete").on('click', function() {
            return confirm('Are You Sure ?')
        });

        $('.numeric_only').bind('keyup paste', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $(".curency").on("keyup", function() {
            var rgx = /^[0-9]*\.?[0-9]*$/;
            if ($(this).val().match(rgx)) {
                return true;
            } else {
                alert("Hanya bisa di input angka dan titik");
                this.value = this.value.replace(/[^0-9]/g, '');
            }
        });

        function onlyNumbersWithDot(e) {
            var charCode;
            if (e.keyCode > 0) {
                charCode = e.which || e.keyCode;
            } else if (typeof(e.charCode) != "undefined") {
                charCode = e.which || e.keyCode;
            }
            if (charCode == 46)
                return true
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script> --}}
    
    @stack('scripts')

@stop
