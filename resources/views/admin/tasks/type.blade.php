<div class="modal fade" id="type-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" style="border-radius: 10px">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="card" style="margin-bottom: 0;">
                <div class="card-body">
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
                                        <input type="radio" class="custom-control-input" value="created" id="created" name="type">
                                        <label class="custom-control-label text-xs badge badge-warning" for="created">{{__('lang.created')}}</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="ongoing" id="ongoing" name="type">
                                        <label class="custom-control-label text-xs badge badge-danger" for="ongoing">{{__('lang.ongoing')}}</label>
                                    </div>
                                </div>
                                <input type="hidden" name="task_id" value="" id="task_id">
                                <div class="form-group col-lg-6">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="testing" id="testing" name="type">
                                        <label class="custom-control-label text-xs  badge badge-dark" for="testing">{{__('lang.testing')}}</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="finished" id="finished" name="type">
                                        <label class="custom-control-label text-xs  badge badge-success" for="finished">{{__('lang.finished')}}</label>
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
