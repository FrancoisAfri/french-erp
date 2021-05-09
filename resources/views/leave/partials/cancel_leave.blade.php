<div id="cancel-leave-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="cancel-leave-form">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Annuler le congé</h4>
                </div>
                <div class="modal-body">
                    <div id="leave-invalid-input-alert"></div>
                    <div id="success-alert"></div>
                    <div class="form-group">
                           <label for="reason" class="col-sm-2 control-label">Raison de l'annulation</label>
                            <div class="col-sm-8">
                               <div class="input-group">
                                    <div class="input-group-addon">
                                       <i class="fa fa-comment-o"></i>
                                    </div>
                                    <textarea class="form-control" id="reason" name="reason" placeholder="Entrez le motif de l'annulation ..." rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                                            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="button" id="cancellation-reason" class="btn btn-primary">Sauvegarder</button>
                    
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>