<div class="modal fade" id="status-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" style="border-radius: 10px">
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
                                    <div class="form-group col-lg-12">
                                        <select name="type" id="type" class="form-control">
                                            <option value="created">{{__('lang.created')}}</option>
                                            <option value="ongoing">{{__('lang.ongoing')}}</option>
                                            <option value="testing">{{__('lang.testing')}}</option>
                                            <option value="finished">{{__('lang.finished')}}</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-success">
                                            <li class="fa fa-save"></li>
                                            {{__('lang.save')}}</button>
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
