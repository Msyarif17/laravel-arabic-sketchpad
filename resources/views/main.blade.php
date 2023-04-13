@extends('layouts.master')
@section('content')
    <section class="container">
        <div class="row pt-3">
            <div class="col-12">
                <div class="row mt-3">
                    <div class="col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center fw-bold text-capitalize">

                                            <h4 id="question">
                                                Silahkan pilih Soal dibawah / Disamping
                                            </h4>
                                        </div>
                                        <div class="mx-auto">
                                            <div class="row justify-content-center my-3">
                                                <div class="col-md-10 col-sm-8 " id="img-quest">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center" id="sCanvas">
                                            <canvas class="w-100 h-50 rounded sketchpad border" id="sketchpad"
                                                style="background-color: white"></canvas>


                                        </div>
                                        <div class="container-fluid mt-3" id="canvas-buttons">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4 canvas-button ps-0 pe-1">
                                                    <button class="btn btn-primary w-100" id="undo"><i
                                                            class="fa-solid fa-undo"></i> Undo</button>
                                                </div>
                                                <div class="col-4 canvas-button px-1">
                                                    <button class="btn btn-primary w-100" id="redo"><i
                                                            class="fa-solid fa-redo"></i> Redo</button>
                                                </div>
                                                <div class="col-4 canvas-button pe-0 ps-1">
                                                    <button class="btn btn-danger w-100" id="clear"><i
                                                            class="fa-solid fa-x"></i>
                                                        Clear</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                {{-- <span class="d-none"></span> --}}
                                                <div class="col-12 p-0" id="information-button">
                                                    <div class="w-100" id="confirmation-button">
                                                        <button class="btn btn-secondary w-100" id>
                                                            <i class="fa-solid fa-clock"></i>
                                                            Sedang Menunggu Konfirmasi
                                                        </button>
                                                    </div>
                                                    <div class="w-100 pb-3" id="reject-button">
                                                        <button class="btn btn-danger w-100" id>
                                                            <i class="fa-solid fa-x"></i>
                                                            Jawaban Anda Tidak Diterima
                                                        </button>
                                                    </div>

                                                    <div class="w-100" id="accepted-button">
                                                        <button class="btn btn-success w-100" id>
                                                            <i class="fa-solid fa-check"></i>
                                                            Jawaban Anda Diterima
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-12 p-0">
                                                    <button id="submit" data-id="" class="btn btn-success w-100">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">
                                <a onclick="previous()"
                                    class="text-start w-100 btn bg-transparent align-self-center text-dark">
                                    <i class="fa-solid fa-chevron-left" style="font-size:30px"></i>
                                    PREVIOUS
                                </a>
                            </div>
                            <div class="col-6">
                                <a id="next" onclick="next()"
                                    class="text-end w-100 btn bg-transparentalign-self-center text-dark">
                                    NEXT
                                    <i class="fa-solid fa-chevron-right" style="font-size:30px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 ">
                        <div class="card">

                            <div class="card-body">
                                @foreach ($quest as $level)
                                    <div class="row">
                                        {{-- {{dd($quest)}} --}}
                                        <div class="col-12 text-center text-capitalize">
                                            <h4>Level {{ $level->name }} {{ $level->level }} </h4>
                                        </div>
                                    </div>
                                    <div class="row text-center justify-content-center">
                                        @foreach ($level->question as $key => $item)
                                            @if ($item->answer_from_users->count() > 0)
                                                @if ($item->answer_from_users[0]->is_true == 1)
                                                    <button onclick="show({{ $item->id }})"
                                                        val="{{ $item->answer_from_users->count() }}"id="quest-button-{{ $item->id }}"
                                                        class="col-2  btn btn-success text-light m-1 py-2">{{ $key + 1 }}</button>
                                                @else
                                                    <button onclick="show({{ $item->id }})"
                                                        val="{{ $item->answer_from_users->count() }}"id="quest-button-{{ $item->id }}"
                                                        class="col-2  btn btn-danger text-light m-1 py-2">{{ $key + 1 }}</button>
                                                @endif
                                            @else
                                                <button onclick="show({{ $item->id }})"
                                                    val="{{ $item->answer_from_users->count() }}"id="quest-button-{{ $item->id }}"
                                                    class="col-2  btn btn-primary text-light m-1 py-2">{{ $key + 1 }}</button>
                                            @endif
                                        @endforeach

                                    </div>
                                @endforeach
                                <div class="row mt-3">
                                    <div class="col-12">
                                        {!! $quest->links('vendor.pagination.bootstrap-5') !!}
                                    </div>
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

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sketchpad/0.1.0/scripts/sketchpad.min.js"
        integrity="sha512-GTMvKIuYWnu5y1gGLUbMNIXbxusPHehyCdBZJpv+oPikopcgjWBmsIziyp9N8QlRXRFB9y02mQ0C1MRnelE5tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{asset('assets/js/obfuscated.js')}}"></script> --}}
    <script>
        $("#submit").hide();

        function hideInformationButton() {

            $("#confirmation-button").hide();
            $("#reject-button").hide();
            $("#accepted-button").hide();
        }
        hideInformationButton();

        function show(id) {
            $.ajax({
                url: "{{ route('main') }}?id=" + id,
                type: 'GET',
                success: function(data) {
                    $("#question").text(data.question);
                    document.querySelector("#img-quest").style =
                        `height:200px;background-image: url(/storage${data.image_question});background-position: center;background-repeat: no-repeat;background-size: contain`;
                    if (data.answer_from_users.length > 0) {
                        $("#img-answer").remove();
                        $(".canvas-button").hide();
                        $(".sketchpad").hide();
                        $("#submit").hide();
                        $("#sCanvas")
                            .append(`<img id="img-answer"src="/storage/` + data.answer_from_users[0]
                                .image_answers +
                                `"alt="" class="img-fluid rounded border border-primary" >`);
                        $("#information-button").show();
                        if (data.answer_from_users[0].is_true) {
                            $("#quest-button-" + data.id).removeClass('btn-secondary').addClass(
                                'btn-secondary');
                            $("#accepted-button").show();
                            $("#confirmation-button").hide();
                            $("#reject-button").hide();
                        } else {
                            $("#quest-button-" + data.id).removeClass('btn-secondary').addClass('btn-danger');
                            $("#reject-button").show();
                            $("#confirmation-button").hide();
                            $("#accepted-button").hide();
                        }
                    } else {
                        $("#img-answer").remove();
                        $(".canvas-button").show();
                        $(".sketchpad").show();
                        hideInformationButton();
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

                        var canvas = document.getElementById("sketchpad");
                        var ctx = canvas.getContext("2d");
                        ctx.fillStyle = "white";
                        ctx.fillRect(0, 0, canvas.width, canvas.height);
                        // sketchpad();
                        $("#submit").show();
                        $("#submit").attr('data-id', data.id);
                    }
                    // console.log(data);
                }
            });
        }
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
        var canvas = document.getElementById("sketchpad");
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        $("#submit").click(function() {

            var dataURL = canvas.toDataURL('image/png');
            // console.log();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var request = $.ajax({
                url: "{{ route('submit') }}",
                type: "POST",
                data: {
                    image_answer: dataURL,
                    quest_id: $("#submit").attr('data-id'),

                },
                dataType: "html"
            });
            // console.log(request);
            request.done(function(res) {
                console.log(res);
                res = JSON.parse(res);
                let confetti = new Confetti('#submit');
                alert(res['msg']);
                $("#quest-button-" + res['data']['id']).removeClass('btn-primary');
                // console.log(res);
                $(".sketchpad").hide();
                $("#quest-button-" + res['data']['id']).addClass('btn-secondary');
                $(".canvas-button").hide();
                $("#sCanvas").hide();
                $("#confirmation-button").show();
                $("#submit").hide();

                $("#confirmation-button").show();
                $("#reject-button").hide();
                $("#accepted-button").hide();
            });

            request.fail(function(jqXHR, textStatus) {
                console.log(jqXHR);
                alert("Request failed: "+jqXHR + textStatus);
            });
        });
    </script>
    <script>
        
    </script>

@stop
