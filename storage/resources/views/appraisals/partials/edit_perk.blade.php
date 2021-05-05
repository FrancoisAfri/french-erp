<div id="edit-perk-modal" class="modal modal-default fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="edit-perk-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Perk Details</h4>
                </div>
                <div class="modal-body">
                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="perk-img"></div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="Perk Name"{{ (isset($isReaOnly) && $isReaOnly) ? ' readonly' : '' }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" placeholder="Perk Description" rows="3"{{ (isset($isReaOnly) && $isReaOnly) ? ' readonly' : '' }}></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="req_percent" class="col-sm-2 control-label">Performance Score</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="req_percent" name="req_percent" value="" placeholder="Required Performance Score (in percentage)"{{ (isset($isReaOnly) && $isReaOnly) ? ' readonly' : '' }}>
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                            @if(!(isset($isReaOnly) && $isReaOnly))
                                <div class="form-group">
                                    <label for="img" class="col-sm-2 control-label">Perk Image</label>

                                    <div class="col-sm-10">
                                        <input type="file" id="img" name="img" class="file file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png"]' data-show-upload="false">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
                    @if(!(isset($isReaOnly) && $isReaOnly))
                        <button type="button" id="update-perk" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                    @endif
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>