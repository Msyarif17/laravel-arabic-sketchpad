@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row pt-3">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-body">
                                <div class="text-center fw-bold">
                                    <x-question />
                                </div>
                                <div class="mx-auto">
                                    <x-image-question />
                                </div>
                                <div class="d-flex justify-content-center">
                                    <canvas class="w-100 h-50 rounded sketchpad border" id="sketchpad"><canvas>

                                </div>
                                <div class="container-fluid mt-3">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4 ps-0 pe-1">
                                            <button class="btn btn-primary w-100" id="undo"><i
                                                    class="fa-solid fa-undo"></i> Undo</button>
                                        </div>
                                        <div class="col-4 px-1">
                                            <button class="btn btn-primary w-100" id="redo"><i
                                                    class="fa-solid fa-redo"></i> Redo</button>
                                        </div>
                                        <div class="col-4 pe-0 ps-1">
                                            <button class="btn btn-danger w-100" id="clear"><i
                                                    class="fa-solid fa-x"></i> Clear</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 p-0">
                                            <button id="submit" class="btn btn-success w-100">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Level 1</h4>
                                    </div>
                                </div>
                                <div class="row text-center justify-content-center">
                                    @foreach ($quest as $key=>$item)
                                        
                                    <button onclick="show({{$item}})" class="col-2 btn btn-success text-light m-1 py-2">{{$key+1}}</button>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sketchpad/0.1.0/scripts/sketchpad.min.js"
        integrity="sha512-GTMvKIuYWnu5y1gGLUbMNIXbxusPHehyCdBZJpv+oPikopcgjWBmsIziyp9N8QlRXRFB9y02mQ0C1MRnelE5tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var objPropLogEl = document.querySelector('#card-main');


        function show(data){
            console.log(data);
        }
    </script>
    <script>
        var w = $(".sketchpad").width();
        var h = $(".sketchpad").height();
        // console.log(w);
        var sketchpad = new Sketchpad({
            element: '#sketchpad',
            width: w,
            height: h
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
                url: "{{ route('dashboard.answers.store') }}",
                type: "POST",
                data: {
                    image_answer: dataURL,
                },
                dataType: "html"
            });
            // console.log(request);
            request.done(function(msg) {
                let confetti = new Confetti('#submit');
                alert(msg);
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
@endpush
