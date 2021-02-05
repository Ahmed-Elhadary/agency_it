@extends('admin.layouts.app')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('lang.home')}}</a></li>
    <li class="breadcrumb-item active"><a href="#">{{__('lang.permissions')}}</a></li>
@endsection
@section('title')
    {{__('lang.permissions')}}
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
                    <h4  style="font-weight: bold"> {{__('lang.permissions')}}
                    </h4>
                    <div class="col-lg-12 page-title-box">
                        <div class="alert alert-info">
                            {{__('lang.super_desc')}}
                        </div>
                    </div>
                    <hr>
                   <form id="form" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                       {{ csrf_field() }} {{ method_field('POST') }}
                       <div class="form-group row">
                          <div class="col-lg-6 pt-1">
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="task_add" name="task_add" {{$group->task_add == 1 ? 'checked' : ''}}>
                                  <label class="custom-control-label text-xs" for="task_add">{{__('lang.task_add')}}</label>
                              </div>
                          </div>
                           <div class="col-lg-6 pt-1">
                               <div class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input" id="task_edit" name="task_edit" {{$group->task_edit == 1 ? 'checked' : ''}}>
                                   <label class="custom-control-label text-xs" for="task_edit">{{__('lang.task_edit')}}</label>
                               </div>
                           </div>
                           <div class="col-lg-6 pt-1">
                               <div class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input" id="task_delete" name="task_delete" {{$group->task_delete == 1 ? 'checked' : ''}}>
                                   <label class="custom-control-label text-xs" for="task_delete">{{__('lang.task_delete')}}</label>
                               </div>
                           </div>
                           <div class="col-lg-6 pt-1">
                               <div class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input" id="task_open" name="task_open" {{$group->task_open == 1 ? 'checked' : ''}}>
                                   <label class="custom-control-label text-xs" for="task_open">{{__('lang.task_open')}}</label>
                               </div>
                           </div>
                           <div class="col-lg-6 pt-1">
                               <div class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input" id="task_reopen" name="task_reopen" {{$group->task_reopen == 1 ? 'checked' : ''}}>
                                   <label class="custom-control-label text-xs" for="task_reopen">{{__('lang.task_reopen')}}</label>
                               </div>
                           </div>
                           <div class="col-lg-6 pt-1">
                               <div class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input" id="task_close" name="task_close" {{$group->task_close == 1 ? 'checked' : ''}}>
                                   <label class="custom-control-label text-xs" for="task_close">{{__('lang.task_close')}}</label>
                               </div>
                           </div>
                           <div class="col-lg-6 pt-1">
                               <div class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input" id="task_assign" name="task_assign" {{$group->task_assign == 1 ? 'checked' : ''}}>
                                   <label class="custom-control-label text-xs" for="task_assign">{{__('lang.task_assign')}}</label>
                               </div>
                           </div>
                           <div class="col-lg-6 pt-1">
                               <div class="custom-control custom-checkbox">
                                   <input type="checkbox" class="custom-control-input" id="super" name="super" {{$group->super == 1 ? 'checked' : ''}}>
                                   <label class="custom-control-label text-xs" for="super">{{__('lang.super')}}</label>
                               </div>
                           </div>

                           <div class="col-lg-12 pt-3">
                               <hr>
                               <button type="submit" class="btn btn-primary">{{__('lang.save')}}
                                   <i class="fa fa-save"></i>
                               </button>
                           </div>
                           <input type="hidden" name="group_id" value="{{$group->id}}">
                       </div>
                   </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        /* add function*/
        $(function(){
            $('#form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    url = "{{ url('admin/permissions') }}";
                    $.ajax({
                        url : url,
                        type : "POST",
//                        data : $('#modal-form form').serialize(),
                        data: new FormData($("#form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            if(data) {
                                swal({
                                    title:"{{__('lang.edited')}}",
                                    text: data.message,
                                    type: 'success',
                                    timer: '750'
                                });
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
