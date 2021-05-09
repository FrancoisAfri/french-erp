<div id="edit-category-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="edit-category-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modifier la catégorie</h4>
                </div>
                <div class="modal-body">
                    <div id="category-invalid-input-alert"></div>
                    <div id="category-success-alert"></div>
                    <div class="form-group">
                        <label for="category" class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="category" value="" placeholder="Entrez le nom" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="description" name="description" value="" placeholder="Entrez la description" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="button" id="update-category" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>