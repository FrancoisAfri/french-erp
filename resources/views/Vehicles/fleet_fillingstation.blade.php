@extends('layouts.main_layout')
@section('page_dependencies')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/datepicker/datepicker3.css">
<!-- iCheck -->
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/iCheck/square/blue.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"> Vehicle Station  </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px; text-align: center;"></th>
                                <th>Name</th>
                                <th>Description</th>
                                <th style="width: 5px; text-align: center;"></th>
                                <th style="width: 5px; text-align: center;"></th>
                            </tr>
                            @if (count($fleetfillingstation) > 0)
                              @foreach ($fleetfillingstation as $filling)
                               <tr id="categories-list">
                               <td nowrap>
                                        <button vehice="button" id="edit_compan" class="btn btn-warning  btn-xs" data-toggle="modal" data-target="#edit-package-modal" data-id="{{ $filling->id }}" data-name="{{ $filling->name }}" data-description="{{$filling->description}}" ><i class="fa fa-pencil-square-o"></i> Edit</button>
                                  </td>
                                     <td>{{ (!empty( $filling->name)) ?  $filling->name : ''}} </td>
                                     <td>{{ (!empty( $filling->description)) ?  $filling->description : ''}} </td>
                                  <td>
                                    <!--   leave here  -->
                                    <button vehice="button" id="view_ribbons" class="btn {{ (!empty($filling->status) && $filling->status == 1) ? " btn-danger " : "btn-success " }}
                                      btn-xs" onclick="postData({{$filling->id}}, 'actdeac');"><i class="fa {{ (!empty($filling->status) && $filling->status == 1) ?
                                      " fa-times " : "fa-check " }}"></i> {{(!empty($filling->status) && $filling->status == 1) ? "De-Activate" : "Activate"}}</button>
                                 </td>
                                 <td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-station-warning-modal" data-id="{{ $filling->id }}"><i class="fa fa-trash"></i> Delete</button></td>
                                </tr>
                                   @endforeach
                               @else
                               <tr id="categories-list">
                        <td colspan="5">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            No Fleet Filling Station damage categories  to display, please start by adding a new Filling Station..
                        </div>
                        </td>
                        </tr>
                           @endif
                        </table>
                      <!--   </div> -->
                                   <!-- /.box-body -->
                    <div class="box-footer">
                     <button type="button" class="btn btn-default pull-left" id="back_button">Back</button>
                     <button type="button" id="cat_module" class="btn btn-warning pull-right" data-toggle="modal" data-target="#add-station-modal" ">Add new  Filling Station </button>
                    </div>
             </div>
        </div>
   <!-- Include add new prime rate modal -->
        @include('Vehicles.partials.add_fillingstation_modal')
        @include('Vehicles.partials.edit_fillingstation_modal')
        <!-- Include delete warning Modal form-->
            @if (count($fleetfillingstation) > 0)
                @include('Vehicles.warnings.station_warning_action', ['modal_title' => 'Delete Vehicle station', 'modal_content' => 'Are you sure you want to delete this Fleet Type? This action cannot be undone.'])
            @endif

</div>


@endsection

@section('page_script')
<script src="/custom_components/js/modal_ajax_submit.js"></script>
<!-- Select2 -->
<script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script>
       function postData(id , data ){   
            if(data == 'actdeac') location.href = "/vehice/station_act/" + id;
          
        }
        $('#back_button').click(function () {
                location.href = '/vehicle_management/setup';
            });

        $(function () {
            var moduleId;
            //Initialize Select2 Elements
            $(".select2").select2();

            //Tooltip

            $('[data-toggle="tooltip"]').tooltip();
            //Vertically center modals on page
            function reposition() {
                var modal = $(this),
                        dialog = modal.find('.modal-dialog');
                modal.css('display', 'block');

                // Dividing by two centers the modal exactly, but dividing by three
                // or four works better for larger screens.
                dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
            }
            // Reposition when a modal is shown
            $('.modal').on('show.bs.modal', reposition);
            // Reposition when the window is resized
            $(window).on('resize', function() {
                $('.modal:visible').each(reposition);
            });

            //Show success action modal
            $('#success-action-modal').modal('show');
    
            //

            $(".js-example-basic-multiple").select2();

            //save Fleet
            //Post module form to server using ajax (ADD)
            $('#add-filling-station').on('click', function() {
                //console.log('strUrl');
                var strUrl = '/vehice/add_fillingstation';
                var modalID = 'add-station-modal';
                var objData = {
                    name: $('#'+modalID).find('#name').val(),
                    description: $('#'+modalID).find('#description').val(),
                    _token: $('#'+modalID).find('input[name=_token]').val()
                };
                var submitBtnID = 'add-filling-station';
                var redirectUrl = '/vehicle_management/fillingstaion';
                var successMsgTitle = 'New Fuel Station Added!';
                var successMsg = 'The Fuel Station has been updated successfully.';
                //var formMethod = 'PATCH';
                modalAjaxSubmit(strUrl, objData, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
            });

              var fleetID;
            $('#edit-package-modal').on('show.bs.modal', function (e) {
                    //console.log('kjhsjs');
                var btnEdit = $(e.relatedTarget);
                fleetID = btnEdit.data('id');
                var name = btnEdit.data('name');
                var description = btnEdit.data('description');
                var modal = $(this);
                modal.find('#name').val(name);
                modal.find('#description').val(description);
             });
            $('#edit_station').on('click', function () {
                var strUrl = '/vehice/edit_station/' + fleetID;
                var modalID = 'edit-package-modal';
                var objData = {
                    name: $('#'+modalID).find('#name').val(),
                    description: $('#'+modalID).find('#description').val(),
                    _token: $('#'+modalID).find('input[name=_token]').val()
                };
                var submitBtnID = 'edit_station';
                var redirectUrl = '/vehicle_management/fillingstaion';
                var successMsgTitle = 'Changes Saved!';
                var successMsg = 'The Fleet Type has been updated successfully.';
                var Method = 'PATCH';
                modalAjaxSubmit(strUrl, objData, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg, Method);
            });
            
            var stationID;
                    $('#delete-station-warning-modal').on('show.bs.modal', function (e) {
                        var btnEdit = $(e.relatedTarget);
                        stationID = btnEdit.data('id');
                        var modal = $(this);
                    });

                    $('#delete_station').on('click', function () {
                        var strUrl = '/vehice/station/'+ stationID;
                        var modalID = 'delete-station-warning-modal';
                        var objData = {
                            _token: $('#' + modalID).find('input[name=_token]').val()
                        };
                        var submitBtnID = 'delete_station';
                        var redirectUrl = '/vehicle_management/fillingstaion';
                       //var Method = 'PATCH';
                        modalAjaxSubmit(strUrl, objData, modalID, submitBtnID, redirectUrl);
                    });

        });
    </script>
@endsection
