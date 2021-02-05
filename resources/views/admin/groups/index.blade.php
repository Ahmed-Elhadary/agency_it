@extends('admin.layouts.app')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('lang.home')}}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{__('lang.groups')}}</a></li>
@endsection
@section('title')
    {{__('lang.groups')}}
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
                    <h4  style="font-weight: bold"> {{__('lang.groups')}}

                        <a onclick="addForm()" class="btn btn-primary pull-right text-white" style="float: left">
                            <span class="fa fa-plus-circle"></span> {{__('lang.add')}} {{__('lang.groups')}}
                        </a>
                    </h4>
                    <div class="col-lg-12 page-title-box">

                    </div>
                    <table id="groups-table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th> {{__('lang.m')}}</th>
                            <th>  {{__('lang.name')}}</th>
                            <th style="min-width: 5rem">
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
    @include('admin.groups.form')
@endsection
@section('scripts')
    <script type="text/javascript">
        var table = $('#groups-table').DataTable({

            dom: 'Bfrtip',
            buttons: [{ extend: 'copy', className: 'btn btn-outline-primary btn-xs' },
                { extend: 'csv', className: 'btn btn-outline-info btn-xs' },
                { extend: 'excel', className: 'btn btn-outline-success btn-xs' },
                { extend: 'pdf', className: 'btn btn-outline-danger btn-xs' },
                { extend: 'print', className: 'btn btn-outline-dark btn-xs' },
            ],
            lengthChange: true,
            ajax: "{{ route('api.groups')}}",
            columns: [
                {data: 'idn', name: 'idn'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],

        });
        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('{{__("lang.add") .__("lang.groups")}}');
        }

        function showForm(id) {
            $.ajax({
            url: "{{ url('admin/groups') }}" + '/' + id + "/edit",
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
                url: "{{ url('admin/groups') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#modal-form').modal('show');
                    $('.modal-title').text('{{__("lang.edit").__("lang.groups")}}');
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
                    url: "{{ url('admin/groups') }}" + '/' + id,
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
                    if (save_method == 'add') url = "{{ url('admin/groups') }}";
                    else url = "{{ url('admin/groups') . '/' }}" + id;

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

    </script>
@endsection
