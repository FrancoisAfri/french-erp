@extends('layouts.main_layout')

@section('page_dependencies')
        <!-- bootstrap datepicker -->
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/datepicker/datepicker3.css">
<!-- Select2
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">-->
<!-- bootstrap file input -->
<link href="/bower_components/bootstrap_fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/iCheck/square/green.css">
@endsection

@section('content')
    <div class="row">
        <!-- New Company Form -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <i class="fa fa-building pull-right"></i>
                    <h3 id="box-title" class="box-title">New {{ $str_company_type }}</h3>
                    <p id="box-subtitle">Enter {{ strtolower($str_company_type) }} details:</p>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="/contacts/company/create" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="box-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Invalid Input Data!</h4>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Partner Type</label>

                            <div class="col-sm-10">
                                <label class="radio-inline" style="padding-left: 0px;"><input type="radio" id="rdo_provider" name="company_type" value="1"{{ (old('company_type') == 1) ? ' checked' : '' }}{{ ($company_type === 1) ? ' checked' : '' }}> Service Provider</label>
                                <label class="radio-inline"><input type="radio" id="rdo_school" name="company_type" value="2"{{ (old('company_type') == 2) ? ' checked' : '' }}{{ ($company_type === 2) ? ' checked' : '' }}> School</label>
                                <label class="radio-inline"><input type="radio" id="rdo_sponsor" name="company_type" value="3"{{ (old('company_type') == 3) ? ' checked' : '' }}{{ ($company_type === 3) ? ' checked' : '' }}> Sponsor</label>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label id="name-lbl" for="name" class="col-sm-2 control-label">{{ ($company_type === 2) ? 'School' : 'Company' }} Name</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building-o"></i>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter The Name Of The {{ ($company_type === 2) ? 'School' : 'Company' }}...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group provider-field{{ $errors->has('registration_number') ? ' has-error' : '' }}">
                            <label for="registration_number" class="col-sm-2 control-label">Registration Number</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building-o"></i>
                                    </div>
                                    <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ old('registration_number') }}" placeholder="Enter Company Registration Number...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group provider-field{{ $errors->has('vat_number') ? ' has-error' : '' }}">
                            <label for="vat_number" class="col-sm-2 control-label">VAT Number</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-certificate"></i>
                                    </div>
                                    <input type="text" class="form-control" id="vat_number" name="vat_number" value="{{ old('vat_number') }}" placeholder="Enter VAT Number...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group provider-field{{ $errors->has('tax_number') ? ' has-error' : '' }}">
                            <label for="tax_number" class="col-sm-2 control-label">Tax Number</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-certificate"></i>
                                    </div>
                                    <input type="text" class="form-control" id="tax_number" name="tax_number" value="{{ old('tax_number') }}" placeholder="Enter Tax Number...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group provider-field{{ $errors->has('bee_score') ? ' has-error' : '' }}">
                            <label for="bee_score" class="col-sm-2 control-label">BEE Score</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <input type="text" class="form-control" id="bee_score" name="bee_score" value="{{ old('bee_score') }}" placeholder="Enter BEE Score...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group provider-field{{ $errors->has('bee_certificate_doc') ? ' has-error' : '' }}">
                            <label for="bee_certificate_doc" class="col-sm-2 control-label">BEE Certificate</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                    <input type="file" id="bee_certificate_doc" name="bee_certificate_doc" class="file file-loading" data-allowed-file-extensions='["pdf"]' data-show-upload="false">
                                </div>
                            </div>
                        </div>
                        <div class="form-group provider-field{{ $errors->has('comp_reg_doc') ? ' has-error' : '' }}">
                            <label for="comp_reg_doc" class="col-sm-2 control-label">Company Registration Document</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                    <input type="file" id="comp_reg_doc" name="comp_reg_doc" class="file file-loading" data-allowed-file-extensions='["pdf"]' data-show-upload="false">
                                </div>
                            </div>
                        </div>
                        <div class="form-group provider-field{{ $errors->has('supporting_doc') ? ' has-error' : '' }}">
                            <label for="comp_reg_doc" class="col-sm-2 control-label">Other Supporting Document</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </div>
                                        <input type="file" id="supporting_doc" name="supporting_doc" class="file file-loading" data-allowed-file-extensions='["pdf", "docx", "doc"]' data-show-upload="false">
                                    </div>
                                </div>
                        </div>
                        <!-- /.form-group -->
                        <!--
                        <div class="form-group provider-field">
                            <label for="comp_reg_doc_name[]" class="col-sm-2 control-label">Company Registration Document</label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <input type="text" class="form-control" id="comp_reg_doc_name[]" name="comp_reg_doc_name[]" placeholder="Enter Document Name...">
                                </div>
                            </div>
                            <label for="comp_reg_doc[]" class="col-sm-1 control-label">Document</label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                    <input type="file" id="comp_reg_doc[]" name="comp_reg_doc[]" class="file file-loading" data-allowed-file-extensions='["pdf", "docx"]' data-show-upload="false">
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="form-group provider-field{{ $errors->has('sector') ? ' has-error' : '' }}">
                            <label for="sector" class="col-sm-2 control-label">Area of Specialisation</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" id="sector" name="sector" value="{{ old('sector') }}" placeholder="Area of Specialisation...">
                                </div>
                            </div>
                        </div>

                        <div class="form-group school_field{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-sm-2 control-label">Telephone</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" data-inputmask='"mask": "(999) 999-9999"' placeholder="Telephone Number..." data-mask>
                                </div>
                            </div>
                        </div>
                        <div class="form-group school_field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-at"></i>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group school_field{{ $errors->has('phys_address') ? ' has-error' : '' }}">
                            <label for="phys_address" class="col-sm-2 control-label">Physical Address</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <textarea id="phys_address" name="phys_address" class="form-control" placeholder="Physical Address...">{{ old('phys_address') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group school_field{{ $errors->has('postal_address') ? ' has-error' : '' }}">
                            <label for="postal_address" class="col-sm-2 control-label">Postal Address</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <textarea id="postal_address" name="postal_address" class="form-control" placeholder="Postal Address...">{{ old('postal_address') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group school_field{{ $errors->has('phys_circuit') ? ' has-error' : '' }}">
                            <label for="phys_circuit" class="col-sm-2 control-label">Circuit</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input type="text" class="form-control" id="phys_circuit" name="phys_circuit" value="{{ old('phys_circuit') }}" placeholder="Circuit...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group school_field{{ $errors->has('phys_region') ? ' has-error' : '' }}">
                            <label for="phys_region" class="col-sm-2 control-label">Region</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input type="text" class="form-control" id="phys_region" name="phys_region" value="{{ old('phys_region') }}" placeholder="Region...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group school_field{{ $errors->has('phys_district') ? ' has-error' : '' }}">
                            <label for="phys_district" class="col-sm-2 control-label">District</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input type="text" class="form-control" id="phys_district" name="phys_district" value="{{ old('phys_district') }}" placeholder="District...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group school_field{{ $errors->has('phys_province_id') ? ' has-error' : '' }}">
                            <label for="phys_province_id" class="col-sm-2 control-label">Province</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <select name="phys_province_id" class="form-control select2">
                                        <option value="">*** Select a Province ***</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}" {{ (old('phys_province_id') == $province->id) ? ' selected' : '' }}>{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button id="cancel" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</button>
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-database"></i> Add</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- End new Company Form-->
    </div>
@endsection

@section('page_script')
    <!-- Select2 -->
    <script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>

    <!-- bootstrap datepicker -->
    <script src="/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Start Bootstrap File input -->
    <!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="/bower_components/bootstrap_fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. This must be loaded before fileinput.min.js -->
    <script src="/bower_components/bootstrap_fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files. This must be loaded before fileinput.min.js -->
    <script src="/bower_components/bootstrap_fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <script src="/bower_components/bootstrap_fileinput/js/fileinput.min.js"></script>
    <!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
    <script src="/bower_components/bootstrap_fileinput/themes/fa/theme.js"></script>
    <!-- optionally if you need translation for your language then include locale file as mentioned below -->
    <!--<script src="/bower_components/bootstrap_fileinput/js/locales/<lang>.js"></script>-->
    <!-- End Bootstrap File input -->

    <!-- InputMask -->
    <script src="/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- iCheck -->
    <script src="/bower_components/AdminLTE/plugins/iCheck/icheck.min.js"></script>

    <script type="text/javascript">
        //Cancel button click event
        document.getElementById("cancel").onclick = function () {
            location.href = "/contacts";
        };

        //function to hide/show fields depending on the company type
        function hideFields() {
            var companyType = $("input[name='company_type']:checked").val();
            if (companyType == 1 || companyType == 3) {
                //console.log('company type: ' + companyType + '. Gets here');
                $('.school_field').hide();
                $('.provider-field').show();
            }
            else if (companyType == 2) {
                $('.provider-field').hide();
                $('.school_field').show();
            }
            return companyType;
        }

        $(function () {
            //Initialize iCheck/iRadio Elements
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                increaseArea: '20%' // optional
            });

            //Initialize Select2 Elements
            $(".select2").select2();

            //Phone mask
            $("[data-mask]").inputmask();

            //Date picker
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true
            });

            // [bootstrap file input] initialize with defaults
            $("#input-1").fileinput();
            // with plugin options
            //$("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});

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

            //Hide/show fields
            hideFields();

            //show/hide fields on radio button toggles
            $('#rdo_provider, #rdo_school, #rdo_sponsor').on('ifChecked', function(){
                var companyType = hideFields();
                if (companyType == 1) {
                    $('#box-title').html('New Service Provider');
                    $('#box-subtitle').html('Enter service provider details');
                }
                else if (companyType == 2) {
                    $('#box-title').html('New School');
                    $('#box-subtitle').html('Enter school details');
                }
                else if (companyType == 3) {
                    $('#box-title').html('New Sponsor');
                    $('#box-subtitle').html('Enter sponsor details');
                }
            });
        });
    </script>
@endsection