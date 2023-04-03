<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <script src="{{ asset('assets/js/confetti.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color:#BFACE2; overflow-x:hidden;">
    {{-- <x-navbar/> --}}
    <main class="container-fluid">
        @yield('content')
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/js/anime.min.js')}}"></script>
    {{-- <script src="https://cdn.sketchpad.pro/dist/current/sketchpad.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sketchpad/0.1.0/scripts/sketchpad.min.js"
        integrity="sha512-GTMvKIuYWnu5y1gGLUbMNIXbxusPHehyCdBZJpv+oPikopcgjWBmsIziyp9N8QlRXRFB9y02mQ0C1MRnelE5tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('js')
    <script>
        var w = $(".sketchpad").width();
        console.log(w);
        var sketchpad = new Sketchpad({
            element: '#sketchpad',
            width: w,
            height: 280
        });
        $("#undo").on("click", function() {
            sketchpad.undo();
        });
        $("#redo").on("click", function() {
            sketchpad.redo();
        });
        $("#clear").on("click", function() {
            sketchpad.clear();
        });
        var $canvas = $("canvas"); // canvas var stored at the top of the code

        $("#submit").click(function() {
            var dataURL = $canvas[0].toDataURL('image/jpg');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var request = $.ajax({
                url: "{{ route('submit') }}",
                type: "POST",
                data: {
                    image_answare: dataURL,
                },
                dataType: "html"
            });
            console.log(request);
            request.done(function(msg) {
                let confetti = new Confetti('#submit');

                // Edit given parameters
                confetti.setCount(75);
                confetti.setSize(10);
                confetti.setPower(25);
                console.log(confetti);
            });

            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        });
    </script>
</body>

</html>
