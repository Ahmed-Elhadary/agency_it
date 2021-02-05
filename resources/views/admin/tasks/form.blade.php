
<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" style="border-radius: 10px">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card" style="margin-bottom: 0;">
                <div class="card-body">
                    <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-header">
                            <h3 class="modal-title" style="color: #333">
                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>

                        </div>

                        <div class="modal-body">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">{{__('lang.name')}}</label>
                                <div class="col-md-12">
                                    <input type="text" id="name" name="name" class="form-control" autofocus >
                                    <span class="text-danger">
                                        <strong id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-3 control-label">{{__('lang.description')}}</label>
                                <div class="col-md-12">
                                    <textarea id="description" name="description" class="form-control" ></textarea>
                                    <span class="text-danger">
                                        <strong id="description-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="due_date" class="col-md-3 control-label">{{__('lang.due_date')}}</label>
                                <div class="col-md-12">
                                    <input type="date" id="due_date" min="{{$today}}" name="due_date" class="form-control" autofocus >
                                    <span class="text-danger">
                                        <strong id="due_date-error"></strong>
                                    </span>
                                </div>
                            </div>
                            @if(auth('admin')->user()->group->permission->task_assign == 1)
                                <div class="form-group">
                                    <label for="assign_id" class="col-md-3 control-label">{{__('lang.assign_id')}}</label>
                                    <div class="col-md-12">
                                        <select id="assign_id"  name="assign_id" class="form-control" >
                                            @foreach($admins as $admin)
                                                <option value="{{$admin->id}}">{{$admin->id == auth('admin')->user()->id ? 'Me' : $admin->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                        <strong id="assign_id-error"></strong>
                                    </span>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="assign_id" value="{{auth('admin')->user()->id}}">
                            @endif

                        </div>
                        <input type="hidden" name="admin_id" value="{{auth('admin')->user()->id}}">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{__('lang.save')}}
                                <i class="fa fa-save"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('lang.close')}}
                                <i class="fa fa-times"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



