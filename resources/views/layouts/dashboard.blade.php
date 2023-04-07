@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .brand-image {
            display: none;
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

    <script>
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
    </script>
    <script>
        /**
         * simple-keyboard documentation
         * https://github.com/hodgef/simple-keyboard
         */

        let Keyboard = window.SimpleKeyboard.default;
        let KeyboardLayouts = window.SimpleKeyboardLayouts.default;

        /**
         * Available layouts
         * https://github.com/hodgef/simple-keyboard-layouts/tree/master/src/lib/layouts
         */
        let layout = new KeyboardLayouts().get("arabic");

        let keyboard = new Keyboard({
            onChange: input => onChange(input),
            onKeyPress: button => onKeyPress(button),
            ...layout
        });

        /**
         * Update simple-keyboard when input is changed directly
         */
        document.querySelector(".input").addEventListener("input", event => {
            keyboard.setInput(event.target.value);
        });
        document.querySelector("#modalEdit .input").addEventListener("input", event => {
            keyboard.setInput(event.target.value);
        });
        console.log(keyboard);

        function onChange(input) {
            document.querySelector(".input").value = input;
            console.log("Input changed", input);
        }

        function onKeyPress(button) {
            console.log("Button pressed", button);

            /**
             * If you want to handle the shift and caps lock buttons
             */
            if (button === "{shift}" || button === "{lock}") handleShift();
        }

        function handleShift() {
            let currentLayout = keyboard.options.layoutName;
            let shiftToggle = currentLayout === "default" ? "shift" : "default";

            keyboard.setOptions({
                layoutName: shiftToggle
            });
        }
    </script>
    @stack('scripts')

@stop
