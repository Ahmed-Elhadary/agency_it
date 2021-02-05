<div class="modal fade" id="priority-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" style="border-radius: 10px">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="card" style="margin-bottom: 0;">
                <div class="card-body">
                    <div class="form-group">
                        <div class="modal-header">
                            <h3 class="modal-title" style="color: #333">

                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>

                        </div>

                        <div class="modal-body">
                            <form id="form-contact2" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                                <div class="row">
                                    {{ csrf_field() }} {{ method_field('POST') }}
                                    <div class="form-group col-lg-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="low" id="low" name="priority">
                                            <label class="custom-control-label text-xs badge badge-primary" for="low">{{__('lang.low')}}</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="high" id="high" name="priority">
                                            <label class="custom-control-label text-xs badge badge-warning" for="high">{{__('lang.high')}}</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="task_id" value="" id="task_id">
                                    <div class="form-group col-lg-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="emergency" id="emergency" name="priority">
                                            <label class="custom-control-label text-xs  badge badge-danger" for="emergency">{{__('lang.emergency')}}</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="ordinary" id="ordinary" name="priority">
                                            <label class="custom-control-label text-xs  badge badge-dark" for="ordinary">{{__('lang.ordinary')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
