@extends('layouts.dashboard')
@section('plugins.Datatables', true)
@push('style')
    <style>

    </style>
@endpush
@section('content')
    <section class="content">
        <div class="row pt-3">
            <div class="col-12">
                <div class="card">
                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-body">
                                @foreach ($submissions as $answer)
                                    <span id="answer-id" class="d-none">{{ $answer->id }}</span>
                                    <div class="text-center fw-bold text-capitalize">

                                        <h4 id="question">
                                            Jawaban {{ $answer->user->name }} pada {{ $answer->question->level->name }}
                                            level {{ $answer->question->level->level }}
                                        </h4>
                                        <hr>
                                    </div>
                                    <div class="row justify-content-center" id="sCanvas">

                                        <div class="col-md-6 col-sm-12 pe-md-1 ps-md-3 text-center text-capitalize">
                                            <p class="fw-bold pt-2 mb-3">
                                                {{ $answer->question->question }}
                                            </p>
                                            <img src="{{ asset('storage' . $answer->question->image_question) }}"
                                                alt="" class="img-fluid border rounded">
                                        </div>
                                        <div class="col-md-6 col-sm-12 pe-md-3 ps-md-1 text-center text-capitalize">
                                            <p class="fw-bold pt-2 mb-3">
                                                Jawaban
                                            </p>
                                            <img src="{{ asset('storage/' . $answer->image_answers) }}" alt=""
                                                class="img-fluid border rounded">

                                        </div>


                                    </div>
                                @endforeach
                                <div class="row mt-3">
                                    {{ $submissions->links('vendor.pagination.submission-check-button') }}
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
    <section class="content mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-start">
                            <div class="align-self-center">
                                <h3>Answer From Expert</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive p-2 p-2">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>User</th>
                                        <th>Question</th>
                                        <th>Image Question</th>
                                        <th>Image Answer</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
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
        $("#reject").click(function(){
            var answerId = $("#answer-id").text();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var request = $.ajax({
                url: `{{ route('dashboard.submissions-check.reject') }}`,
                type: "POST",
                data: {
                    id: answerId
                },
                dataType: "html"
            });
            console.log(request);
            request.done(function(res) {
                var target = $("#reject").attr('href');
                window.location.replace(target);
            });

            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        });
        $("#accept").click(function(){
            var answerId = $("#answer-id").text();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var request = $.ajax({
                url: `{{ route('dashboard.submissions-check.accept') }}`,
                type: "POST",
                data: {
                    id: answerId
                },
                dataType: "html"
            });
            console.log(request);
            request.done(function(res) {
                var target = $("#accept").attr('href');
                window.location.replace(target);
            });

            request.fail(function(jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        });
    </script>
    {{-- <script src="{{ asset('assets/js/obfuscated.js') }}"></script> --}}
    <script>
        $(function() {
            var table = $('#data').DataTable({
                //serverSide: true,
                processing: true,
                searchDelay: 1000,

                ajax: {
                    url: '{{ route('dashboard.submissions-check.index') }}',
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'user_name'
                    },
                    {
                        data: 'question'
                    },
                    {
                        data: 'image_question'
                    },
                    {
                        data: 'image_answers'
                    },
                    {
                        data: 'level'
                    },
                    {
                        data: 'status',
                        name: 'deleted_at',
                        render: function(datum, type, row) {
                            if (row.status == 'Rejected') {
                                return `<span class="badge badge-danger">${row.status}<span>`;
                            }else if (row.status == 'Accepted') {
                                return `<span class="badge badge-success">${row.status}<span>`;
                            } else {
                                return `<span class="badge badge-secondary">${row.status}<span>`;
                            }

                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
