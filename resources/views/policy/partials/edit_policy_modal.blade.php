<div id="edit-policy-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="edit-policy-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modifier</h4>
                </div>
                <div class="modal-body">
                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>
					<div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-sm-2 control-label">catégorie</label>
                        <div class="col-sm-8">
							<select class="form-control" style="width: 100%;"
									id="category_id" name="category_id">
								<option value="">*** Choisissez une catégorie ***</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="path" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value=""
                                   placeholder="Entrez le nom" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="path" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="description" name="description" value=""
                                   placeholder="Entrez la description" required>
                        </div>
                    </div>
                    <hr class="hr-text" data-content="DOCUMENTS UPLOAD">
                    <div class="form-group supDoc-field{{ $errors->has('documents') ? ' has-error' : '' }}">
                        <label for="documents" class="col-sm-2 control-label">Attachement </label>
                        <div class="col-sm-8">
                            <input type="file" id="document" name="document"
                                   class="file file-loading" data-allowed-file-extensions='["pdf", "docx", "doc","txt"]'
                                   data-show-upload="false">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="date" class="col-sm-2 control-label">Date d'achèvement</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="date" name="date"
                                   value="{{ old('date') }}" placeholder="Sélectionner une date ...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    <button type="button" id="edit_policy" class="btn btn-primary"><i class="fa fa-floppy-o"></i>
                        Sauvegarder
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
        
           