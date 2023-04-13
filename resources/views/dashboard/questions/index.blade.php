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
                            <table id="data" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Question</th>
                                        <th>Image Question</th>
                                        <th>Level</th>
                                        <th>Answer From Users</th>
                                        <th>Answer From Experts</th>
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
    <script>
        let Keyboard = window.SimpleKeyboard.default;
        let KeyboardLayouts = window.SimpleKeyboardLayouts.default;

        /**
         * Available layouts
         * https://github.com/hodgef/simple-keyboard-layouts/tree/master/src/lib/layouts
         */
        let layout = new KeyboardLayouts().get("arabic");

        function arabicKeyboard(inputId, keyboardId) {
            let options = {
                onChange: input => onChange(input),
                onKeyPress: button => onKeyPress(button),
                ...layout
            };
            let keyboard = new Keyboard(keyboardId, options);
            /**
             * Update simple-keyboard when input is changed directly
             */
            document.querySelector(inputId).addEventListener("input", event => {
                keyboard.setInput(event.target.value);
            });
            console.log(keyboard);

            function onChange(input) {
                document.querySelector(inputId).value = input;
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
        }

        function create() {
            console.log();
            if ($(".keyboard-create").attr('value') == "0") {
                arabicKeyboard("#input-create", "keyboard-create");
                $(".keyboard-create").attr('value',"1");
            }
            $("input[name=question]").attr('value', '');
            $("textarea[name=image_question]").text('');

        }

        function edit(id) {
            $.ajax({
                url: "/dashboard/questions/" + id + "/edit",
                type: 'GET',
                success: function(res) {
                    if ($( ".keyboard-" + res.id).attr('value') == "0") {
                        arabicKeyboard("#input-" + res.id, "keyboard-" + res.id);
                        $( ".keyboard-" + res.id).attr('value',"1");
                    }
                    console.log(res);
                    $("#edit-" + res.id + " input[name=question]").val(res.question);
                    $("#edit-" + res.id + " #level_id option[value=" + res.level_id + "]").prop('selected',
                        true);
                    $("#edit-" + res.id + " textarea[name=image_question]").text('');
                    // console.log($("#modalEdit #level_id").val(res.level_id).change());
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
                        data: 'answer_from_user'
                    },
                    {
                        data: 'answer_from_expert'
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
