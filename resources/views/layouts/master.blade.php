<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body style="background-color:#BFACE2">
    {{-- <x-navbar/> --}}
    <main class="container-fluid" >
      @yield('content')
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.sketchpad.pro/dist/current/sketchpad.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sketchpad/0.1.0/scripts/sketchpad.min.js" integrity="sha512-GTMvKIuYWnu5y1gGLUbMNIXbxusPHehyCdBZJpv+oPikopcgjWBmsIziyp9N8QlRXRFB9y02mQ0C1MRnelE5tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{asset('assets/js/sketchpad.js')}}"></script> --}}
    <script>
      var w = $(".card").width();
      var sketchpad = new Sketchpad({
        element: '#sketchpad',
        width: w-50,
        height: 300
      });
      $("#undo").on("click",function(){
        sketchpad.undo();
      });
      $("#redo").on("click",function(){
        sketchpad.redo();
      });
      $("#clear").on("click",function(){
        sketchpad.clear();
      })
    </script>
  </body>
</html>