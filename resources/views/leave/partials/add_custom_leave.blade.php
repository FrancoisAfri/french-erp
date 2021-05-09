<div id="add-custom-leave-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="custom-leave-form">
                {{ csrf_field() }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Congé personnalisé</h4>
                </div>
                <div class="modal-body">
                    <div id="leave-invalid-input-alert"></div>
                    <div id="success-alert"></div>
                    <div class="form-group groups">
                        <label for="user_id" class="col-sm-3 control-label">Employé</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select id="hr_id" name="hr_id" class="form-control select2" style="width: 100%;">
									<option selected="selected" value="0">*** Sélectionnez un employé ***</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->first_name . ' ' . $employee->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="action" class="col-sm-3 control-label">Nombre de jours</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <input type="text" class="form-control" id="number_of_days" name="number_of_days" placeholder="Entrez les jours annuels...">
                            </div>
                        </div>
                    </div>
					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="button" id="save_custom_leave" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Sauvegarder</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>