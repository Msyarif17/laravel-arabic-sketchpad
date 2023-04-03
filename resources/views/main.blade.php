@extends('layouts.master')
@section('content')
    <div class="container pt-2">
        <section id="question" class="">
            <div class="d-flex justify-content-center h-100">
                <div id="q1" class="col-md-11 col-sm-12 align-self-center">
                    {{-- <x-list-question-by-level/> --}}
                    <div class="card" id="card-main">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <a onclick="previous()" class="col-1 btn bg-transparent align-self-center text-center text-dark">
                                    <i class="fa-solid fa-chevron-left" style="font-size:30px"></i>
                                </a>
                                <div class="col-10">

                                    <div class="text-center fw-bold">
                                        <x-question />
                                    </div>
                                    <div class="mx-auto">
                                        <x-image-question />
                                    </div>
                                    <x-sketch-pad />
                                </div>
                                <a id="next" onclick="next()" class="col-1 btn bg-transparent h-100 align-self-center text-center text-dark">

                                    <i class="fa-solid fa-chevron-right" style="font-size:30px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
@section('js')
    <script>
        var objPropLogEl = document.querySelector('#card-main');
        
        

        // document.querySelector('a #next').onclick = next();
        function next(){
            objPropLogEl.style.transform = "translate(-1000px,0) scale(0)";
            anime({
                targets: objPropLogEl,
                translateX: {
                    value: 1000,
                    duration: 800
                },
                rotate: {
                    value: 360,
                    duration: 1800,
                    easing: 'easeInOutSine'
                },
                scale: {
                    value: 1,
                    duration: 1600,
                    delay: 800,
                    easing: 'easeInOutQuart'
                },
                delay: 250
                // All properties except 'scale' inherit 250ms delay
            });
        }
        function previous(){
            
            anime({
                targets: objPropLogEl,
                translateX: {
                    value: 1000,
                    duration: 800
                },
                rotate: {
                    value: 360,
                    duration: 1800,
                    easing: 'easeInOutSine'
                },
                scale: {
                    value: 0,
                    duration: 1600,
                    delay: 800,
                    easing: 'easeInOutQuart'
                },
                
                
                delay: 250
                // All properties except 'scale' inherit 250ms delay
            });
        }
    </script>
@stop
