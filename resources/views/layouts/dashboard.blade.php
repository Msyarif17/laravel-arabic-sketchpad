@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('assets/images/Logo Teknik Informatika.png') }}" type="image/x-icon">
    <style>
        .bg-nav {
            background: #685cb8 !important;
        }

        .nav-header,
        .nav-item>.nav-link {
            color: #fff !important;
        }

        .nav-item>.nav-link.active {
            background: #685cb8 !important;
        }

        .brand-text {
            color: #fff !important;
        }

        .logo-dashboard {
            font-size: 100px;
            color: rgba(255, 255, 255, 0.5);
            margin-right: -30px;
            margin-bottom: -30px;

        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <script>
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
    </script>
@stop
