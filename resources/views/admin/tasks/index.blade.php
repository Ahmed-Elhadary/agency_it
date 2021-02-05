@extends('admin.layouts.app')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('lang.home')}}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{__('lang.tasks')}}</a></li>
@endsection
@section('title')
    {{__('lang.tasks')}}
@endsection
@section('content')
    <style>
        tbody tr td{
            margin: 0;
            padding: 0;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="alert-delete"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4  style="font-weight: bold"> {{__('lang.tasks')}}
                        @if(auth('admin')->user()->group->permission->task_add == 1)
                        <a onclick="addForm()" class="btn btn-primary pull-right text-white" style="float: left">
                            <span class="fa fa-plus-circle"></span> {{__('lang.add')}} {{__('lang.tasks')}}
                        </a>
                        @endif
                    </h4>
                    <div class="col-lg-12 page-title-box">

                    </div>
                    <table id="tasks-table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>  {{__('lang.m')}}</th>
                            <th>  {{__('lang.name')}}</th>
                            <th>  {{__('lang.description')}}</th>
                            <th>  {{__('lang.due_date')}}</th>
                            <th>  {{__('lang.assigned')}}</th>
                            <th>  {{__('lang.type')}}</th>
                            <th>  {{__('lang.priority')}}</th>
                            <th>  {{__('lang.status')}}</th>
                            <th style="width: 250px !important;">
                                <i class="fa fa-cogs"></i>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('admin.tasks.form')
    @include('admin.tasks.priority')
    @include('admin.tasks.status')
    @include('admin.tasks.type')
@endsection
@section('scripts')
    <script type="text/javascript">
        var table = $('#tasks-table').DataTable({

            dom: 'Bfrtip',
            buttons: [{ extend: 'copy', className: 'btn btn-outline-primary btn-xs' },
                { extend: 'csv', className: 'btn btn-outline-info btn-xs' },
                { extend: 'excel', className: 'btn btn-outline-success btn-xs' },
                { extend: 'pdf', className: 'btn btn-outline-danger btn-xs' },
                { extend: 'print', className: 'btn btn-outline-dark btn-xs' },
            ],
            lengthChange: true,
            ajax: "{{ route('api.tasks',auth('admin')->id())}}",
            columns: [
                {data: 'idn', name: 'idn'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'due_date', name: 'due_date'},
                {data: 'assigned', name: 'assigned'},
                {data: 'type', name: 'type'},
                {data: 'priority', name: 'priority'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],

        });
        $('#change').change(function () {
            alert(1)
        })
        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('{{__("lang.add") .__("lang.tasks")}}');
        }

        function EditStatus(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: '{{__("lang.alertChange")}}',
                text: '{{__("lang.sure")}}',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '{{__("lang.approve")}}',
                cancelButtonText: '{{__("lang.back")}}'
            }).then(function () {
                $.ajax({
                    url: "{{ url('admin/tasks-status') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'POST', '_token': csrf_token},
                    success: function (data) {
                        if(data) {
                            table.ajax.reload();
                            swal({
                                title: "{{__('lang.deleted')}}",
                                text: data.message,
                                type: 'success',
                                timer: '750'
                            });
                        }
                    },
                    error: function () {

                        swal({
                            title: "{{__('lang.error')}}",
                            text: data.message,
                            type: 'error',
                            timer: '750'
                        })
                    }
                });
            })
        }

        function EditType(id) {
            var ele='';
            $.ajax({
                url: "{{ url('admin/tasks') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    save_method = "add";
                    $('input[name=_method]').val('POST');
                    $('#type-form').modal('show');
                    $('#type-form #task_id').val(data.id);
                    $('#type-form #'+data.type).prop('checked',true);
                    $('.modal-title').text('{{__("lang.change_type")}}');
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }
        function EditPriority(id) {
            var ele='';
            $.ajax({
                url: "{{ url('admin/tasks') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    save_method = "add";
                    $('input[name=_method]').val('POST');
                    $('#priority-form').modal('show');
                    $('#priority-form #task_id').val(data.id);
                    $('#priority-form #'+data.priority).prop('checked',true);
                    $('.modal-title').text('{{__("lang.change_priority")}}');
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }

        function showForm(id) {
            $.ajax({
            url: "{{ url('admin/tasks') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#show-name').html(data.name);
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
            $('#show-photo').modal('show');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('admin/tasks') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#modal-form').modal('show');
                    $('.modal-title').text('{{__("lang.edit").__("lang.tasks")}}');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }
        function deleteData(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: '{{__("lang.alert")}}',
                text: '{{__("lang.sure")}}',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '{{__("lang.approve")}}',
                cancelButtonText: '{{__("lang.back")}}'
            }).then(function () {
                $.ajax({
                    url: "{{ url('admin/tasks') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {

                        if(data.success) {
                            $('#modal-form').modal('hide');

                            table.ajax.reload();
                            swal({
                                title: "{{__('lang.deleted')}}",
                                text: data.message,
                                type: 'success',
                                timer: '750'
                            });
                        }
                    },
                    error: function () {

                        swal({
                            title: "{{__('lang.error')}}",
                            text: data.message,
                            type: 'error',
                            timer: '750'
                        })
                    }
                });
            })
        }
        /* add function*/
        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('admin/tasks') }}";
                    else url = "{{ url('admin/tasks') . '/' }}" + id;

                    $( '#name-error' ).html( " " );

                    $.ajax({
                        url : url,
                        type : "POST",
//                        data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {

                            if(data.errors){
                                if(data.errors.name){
                                    $( '#name-error' ).html( data.errors.name[0] );
                                }
                            }
                            if(data.success) {
                                $('#modal-form').modal('hide');

                                table.ajax.reload();
                                if (save_method == 'add'){
                                    swal({
                                        title:"{{__('lang.added')}}",
                                        text: data.message,
                                        type: 'success',
                                        timer: '750'
                                    });
                                }else{
                                    swal({
                                        title:"{{__('lang.edited')}}",
                                        text: data.message,
                                        type: 'success',
                                        timer: '750'
                                    });
                                }

                            }

                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '750'
                            })
                        }
                    });
                    return false;
                }
            });
        });
        $('[name=type]').click(function(){
            var valueis = $(this).attr('onclick');
            var id = $('#id').val();
            url = "{{ url('admin/tasks-type') }}";
            $.ajax({
                url : url,
                type : "POST",
//                        data : $('#modal-form form').serialize(),
                data: new FormData($("#type-form form")[0]),
                contentType: false,
                processData: false,
                success : function(data) {
                    if(data) {
                        $('#type-form').modal('hide');
                        table.ajax.reload();
                    }

                },
                error : function(data){
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '750'
                    })
                }
            });
        });
        $('[name=priority]').click(function(){
            var valueis = $(this).attr('onclick');
            var id = $('#id').val();
            url = "{{ url('admin/tasks-priority') }}";
            $.ajax({
                url : url,
                type : "POST",
//                        data : $('#modal-form form').serialize(),
                data: new FormData($("#priority-form form")[0]),
                contentType: false,
                processData: false,
                success : function(data) {
                    if(data) {
                        $('#priority-form').modal('hide');
                        table.ajax.reload();
                    }

                },
                error : function(data){
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '750'
                    })
                }
            });
        });
    </script>
@endsection
