@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="align-self-center">
                                <h3>Questions</h3>
                            </div>
                            <div class="align-self-center">

                                @include('dashboard.questions.create')
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
                                        <th>Question</th>
                                        <th>Image Question</th>
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
@push('js')
    
    <script>
        function create() {
            $("#question").attr('value', '');
            // $("#image_question").attr('value', '');

        }

        function edit(id) {
            $.ajax({
                url: "questions/" + id + "/edit",
                type: 'GET',
                success: function(res) {
                    $("#modalEdit #question").val(res.name);
                    $("#modalEdit #image_question").val(res.description);

                }
            });
        }
        $(function() {
            var table = $('#data').DataTable({
                //serverSide: true,
                processing: true,
                searchDelay: 1000,

                ajax: {
                    url: '{{ route('dashboard.questions.index') }}',
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'question'
                    },
                    {
                        data: 'image_question'
                    },
                    {
                        data: 'level'
                    },
                    {
                        data: 'status',
                        name: 'deleted_at',
                        render: function(datum, type, row) {
                            if (row.status == 'Active') {
                                return `<span class="badge badge-success">${row.status}<span>`;
                            } else {
                                return `<span class="badge badge-danger">${row.status}<span>`;
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
