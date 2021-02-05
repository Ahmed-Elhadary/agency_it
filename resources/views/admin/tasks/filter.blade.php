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
                        <form id="form-filter" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('POST') }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="startDate">{{__('lang.startDate')}}</label>
                                    <input type="date" name="startDate" id="startDate" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label for="endDate">{{__('lang.endDate')}}</label>
                                    <input type="date" name="endDate" id="endDate" class="form-control">
                                </div>
                            </div>
                        </form>
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
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                             <tr>
                                 <th>  {{$loop->iteration}}</th>
                                 <th>  {{$task->name}}</th>
                                 <th>  {{$task->description}}</th>
                                 <th>  {{$task->due_date}}</th>
                                 <th>  {{$task->assigned->name}}</th>
                                 <th>  {!! $task->typeLabel !!}</th>
                                 <th>  {!!$task->priorityLabel!!}</th>
                                 <th>  {!!$task->statusLabel!!}</th>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
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
            lengthChange: true
        });
        $('#startDate').change(function(){
            ajaxFilter()
        });
        $('#endDate').change(function(){
            ajaxFilter()
        });
        function ajaxFilter() {
            url = "{{ url('admin/tasks-filter') }}";
            $.ajax({
                url : url,
                type : "POST",
                data: new FormData($("#form-filter")[0]),
                contentType: false,
                processData: false,
                success : function(data) {
                    $('#tasks-table tbody').html("").html(data)
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
        }
    </script>
@endsection
