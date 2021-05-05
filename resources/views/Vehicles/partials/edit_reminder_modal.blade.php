<div id="edit-reminder-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="edit-reminder-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Reminder</h4>
                </div>
                <div class="modal-body">
                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>

                    <div class="form-group">
                        <label for="path" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value=""
                                   placeholder="Enter name" required>
                        </div>
                    </div>


                    <div class="form-group ">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8">

                            <textarea class="form-control" id="description" name="description"
                                      placeholder="Enter description..." rows="3">{{ old('description') }}</textarea>

                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="path" class="col-sm-2 control-label">Start Date </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="startdate" name="start_date"
                                   value="{{ old('start_date') }}" placeholder="Select  start date  ...">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="path" class="col-sm-2 control-label">End Date </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="enddate" name="end_date"
                                   value="{{ old('end_date') }}" placeholder="Select  end date ...">
                        </div>
                    </div>

                    <input type="hidden" id="valueID" name="valueID"
                           value="{{ !empty($maintenance->id) ? $maintenance->id : ''}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="edit_reminder" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
        
           