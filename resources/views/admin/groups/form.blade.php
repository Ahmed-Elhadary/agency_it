
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
                        </div>

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



<div class="modal fade" id="show-photo" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" style="border-radius: 10px">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card" style="margin-bottom: 0;">
                <div class="card-body">
                    <div class="form-group">
                        <div class="modal-header">
                            <h3 class="modal-title" style="color: #333">
                                معلومات المرحلة
                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>

                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    إسم الدرس التعليميى :
                                    <h4 id="show-name"></h4>
                                    <b>إسم الدورة التدريبية :</b>
                                    <span id="show-course"></span>
                                    <br>
                                    <b> إسم المرحلة :</b>
                                    <span id="show-phase"></span>
                                    <br>
                                    <b> إسم المسار :</b>
                                    <span id="show-track"></span>
                                    <br>
                                    <b>الوصف :</b>
                                    <span id="show-description"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
