<div id="edit-new-price-modal" class="modal modal-default fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="edit-module-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit New Price</h4>
                </div>
                <div class="modal-body">
                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>

                     
                    <div class="form-group">
                   
					<div class="form-group">
                        <label for="path" class="col-sm-3 control-label">Product Price</label>
                             <div class="col-sm-8">
								<input type="number" class="form-control" id="price" name="price" value="" placeholder="Enter Product Price" >
                        </div>
                    </div>

                 </div>  
                 <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="adit-price_title" class="btn btn-primary">Save</button>
                </div>
             </form>
            </div>
         </div>
        </div>
 
           