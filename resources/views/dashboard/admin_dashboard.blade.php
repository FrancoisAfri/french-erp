@extends('layouts.main_layout')
@section('page_dependencies')
    <!-- bootstrap file input -->
    <link href="/bower_components/bootstrap_fileinput/css/fileinput.min.css" media="all" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('content')
	<div class="row">
		@if($activeModules->where('code_name', 'cms')->first())
            <div class="col-md-6">
                <div class="box box-muted same-height-widget">
                    <div class="box-header with-border">
                        <i class="fa fa-comments-o"></i>
                        <h3 class="box-title"> Nouvelles</h3>
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                        </ol>
                        <div class="carousel-inner">
                            @if (!empty($news))
                                @foreach($news as $key => $Cmsnews)
                                    <div class="item{{ $key == 0 ? ' active' : '' }}"> <!-- item 1 -->
                                        <a href="{{ '/view/' . $Cmsnews->id }}" id="edit_compan"
                                           class="btn btn-default  btn-xs" target="_blank"><i class=""></i> Lire la suite
                                        </a>
										<b>{{$Cmsnews->description}}</b>
                                        <img class="img-responsive pad" src="{{ Storage::disk('local')->url("CMS/images/$Cmsnews->image") }}" width="400" height="400">

                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>
                </div>
                @include('dashboard.partials.view_news_modal')
            </div>
            <div class="col-md-6">
				<div class="box box-widget">
					<div class="box-header with-border">
						<div class="user-block">
							<span class="username">Directeur General Communication </span>
							<span class="description">Publié - {{!empty($ceonews->date) ? date(' d M Y', $ceonews->date) : ''}}</span>
						</div>
						<div class="box-tools">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					@if (!empty($ceonews))
						<div class="box-body" style="max-height: 400px; overflow-y: scroll;">
							<img class="img-responsive pad" style="padding:0 15 px;  float: left" width="250" height="220" alt="{{!empty($ceonews->name) ? $ceonews->name : ''}}" src="{{ Storage::disk('local')->url("CMS/images/$ceonews->image") }}">
							<p><font size="3">{!!$ceonews->summary!!}</font></p>
						</div>
					@endif
				</div>
			</div>
		@endif
		@if($activeModules->where('code_name', 'leave')->first())
            <div class="col-md-12 box box-default collapsed-box">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-hourglass"></i> Jours de Congés Payés</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<div class="box-body" style="max-height: 274px; overflow-y: scroll;">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Type de Congé</th>
									<th style="text-align: right;"><i class="material-icons">account_balance_wallet</i>Jour(s)
									</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@if (!empty($balances))
								@foreach($balances as $balance)
									<tr>
										<td>{{ (!empty($balance->leavetype)) ?  $balance->leavetype : ''}}</td>
										<td style="text-align: right;">{{ (!empty($balance->leave_balance)) ?  $balance->leave_balance / 8: 0}}</td>
									</tr>
								@endforeach
							@endif
							</tbody>
						</table>
						<div class="box-footer">
							@if (!empty($surbs))
								<button type="button" id="leave-balance" class="btn btn-primary pull-left"
								data-toggle="modal" data-target="#leave-balance-modal"
										>Subordonnés</button>
							@endif
							<button id="Apply" class="btn btn-primary pull-right"><i
										class="fa fa-cloud-download"></i> Demander un Congé
							</button>
						</div>
					</div>
					@if (!empty($surbs))
						@include('dashboard.partials.widgets.leave_balance')
					@endif
				</div>
				<div class="box-footer clearfix">
				</div>
            </div>
			<div class="col-md-12 box box-default collapsed-box">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-hourglass"></i> Personnes en congé ce mois-ci</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<div class="box-body no-padding" style="max-height: 180px; overflow-y: scroll;">
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th style="width: 10px">#</th>
							<th>Employé</th>
							<th class="text-center">De</th>
							<th class="text-center">À</th>
						</tr>
						</thead>
						<tbody>
						@foreach($onLeaveThisMonth as $employee)
							<tr>
								<td style="vertical-align: middle;"
									class="{{ ($employee->is_on_leave_today) ? 'bg-primary' : '' }}"
									nowrap>{{ $loop->iteration }}.
								</td>
								<td style="vertical-align: middle;"
									class="{{ ($employee->is_on_leave_today) ? 'bg-primary' : '' }}">
									<img src="{{ $employee->profile_pic_url }}" class="img-circle"
										 alt="Employee's Photo"
										 style="width: 25px; height: 25px; border-radius: 50%; margin-right: 10px; margin-top: -2px;">
									<span>{{ $employee->full_name }}</span>
								</td>
								<td style="vertical-align: middle;"
									class="text-center {{ ($employee->is_on_leave_today) ? 'bg-primary' : '' }}">{{ ($employee->start_time) ? date('d M Y H:i', $employee->start_time) : (($employee->start_date) ? date('d M Y', $employee->start_date) : '') }}</td>
								<td style="vertical-align: middle;"
									class="text-center {{ ($employee->is_on_leave_today) ? 'bg-primary' : '' }}">{{ ($employee->end_time) ? date('d M Y H:i', $employee->end_time) : (($employee->end_date) ? date('d M Y', $employee->end_date) : '') }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="box-footer clearfix">
				</div>
            </div> 
			<div class="col-md-12 box box-default collapsed-box">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-hourglass"></i> Mes Demandes de Congé</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<div class="box-body" style="max-height: 274px; overflow-y: scroll;">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th><i class="material-icons">shop_two</i> Type de Congé</th>
									<th><i class="fa fa-calendar-o"></i> Dater de</th>
									<th><i class="fa fa-calendar-o"></i> Date à</th>
									<th style="text-align: right;"><i class="fa fa-info-circle"></i> Statut</th>
									<th style="text-align: right;"><i class="fa fa-info-circle"></i> Motif de Rejet / D'annulation
									</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@if (!empty($application))
									@foreach($application as $app)
										<tr>
											<td style="vertical-align: middle;">{{ (!empty($app->leavetype)) ?  $app->leavetype : ''}}</td>
											<td style="vertical-align: middle;">
												{{ !empty($app->start_date) ? date('d M Y ', $app->start_date) : '' }}
											</td>
											<td style="vertical-align: middle;">{{ !empty($app->end_date) ? date('d M Y ', $app->end_date) : '' }}</td>
											<td style="text-align: right; vertical-align: middle;">
												{{ (!empty($app->status) && $app->status > 0) ? $leaveStatusNames[$app->status]." ".$app->reject_reason  : ''}}
											</td>
											<td style="text-align: right; vertical-align: middle;">
												@if ($app->status == 10)
													{{ !empty($app->cancellation_reason) ? $app->cancellation_reason  : ''}}
												@else
													{{ !empty($app->reject_reason) ? $app->reject_reason  : ''}}
												@endif
											</td>
											<td class="text-right" style="vertical-align: middle;">
												@if(in_array($app->status, [2, 3, 4, 5]))
													<button class="btn btn-xs btn-warning"
															title="Cancel Leave Application" data-toggle="modal"
															data-target="#cancel-leave-application-modal"
															data-leave_application_id="{{ $app->id }}"><i
																class="fa fa-times"></i></button>
												@endif
											</td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer clearfix">
				</div>
				@include('dashboard.partials.cancel_leave_application_modal')
            </div>
		@endif
		@if($activeModules->whereIn('code_name', 'security')->first())
            <div class="col-md-12 box box-default collapsed-box">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-hourglass"></i> Anniversaire du Personnel</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<div class="box-body" style="max-height: 274px; overflow-y: scroll;">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Employé</th>
									<th style="text-align: right;"><i class="material-icons">account_balance_wallet</i>
										Date d'anniversaire
									</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($staffAnniversaries as $staff)
									<tr>									
										<td style="vertical-align: middle;"
											class="{{ !empty($staff['is_birthday_today']) ? 'bg-primary' : '' }}">
											<img src="{{ !empty($staff['profile_pic_ur']) ? $staff['profile_pic_ur'] : '' }}" class="img-circle"
											 alt="Employee's Photo"
											 style="width: 25px; height: 25px; border-radius: 50%; margin-right: 10px; margin-top: -2px;">
											<span>{{ $staff['names'] }}</span>
										</td>
										<td style="vertical-align: middle;"
											class="text-center {{ !empty($staff['is_birthday_today']) ? 'bg-primary' : '' }}">{{ !empty($staff['birthday_month']) ? $staff['birthday_month'] : ''}}</td>
									</tr>
							@endforeach 
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer clearfix">
				</div>
            </div>
			<div class="col-md-12 box box-default collapsed-box">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-hourglass"></i> Anniversaires ce mois-ci</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<div class="box-body no-padding" style="max-height: 180px; overflow-y: scroll;">
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Employé</th>
									<th class="text-center">Date de Naissance</th>
								</tr>
							</thead>
							<tbody>
							@foreach($birthdays as $birthday)
								<tr>									
									<td style="vertical-align: middle;"
										class="{{ !empty($birthday['is_birthday_today']) ? 'bg-primary' : '' }}">
										<img src="{{ !empty($birthday['profile_pic_ur']) ? $birthday['profile_pic_ur'] : '' }}" class="img-circle"
										 alt="Employee's Photo"
										 style="width: 25px; height: 25px; border-radius: 50%; margin-right: 10px; margin-top: -2px;">
										<span>{{ $birthday['names'] }}</span>
									</td>
									<td style="vertical-align: middle;"
										class="text-center {{ !empty($birthday['is_birthday_today']) ? 'bg-primary' : '' }}">{{ !empty($birthday['birthday_month']) ? $birthday['birthday_month'] : ''}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer clearfix">
				</div>
            </div>
		@endif
   </div>
@endsection
@section('page_script')
    <!-- Select2 -->
    <script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="/bower_components/AdminLTE/plugins/chartjs/Chart.min.js"></script>
    <!-- Admin dashboard charts ChartsJS -->
    <script src="/custom_components/js/admindbcharts.js"></script>
    <!-- matchHeight.js
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>-->
    <!-- the main fileinput plugin file -->
    <script src="/bower_components/bootstrap_fileinput/js/fileinput.min.js"></script>
    <!-- Ajax form submit -->
    <script src="/custom_components/js/modal_ajax_submit.js"></script>
    <!-- Ajax dropdown options load -->
    <script src="/custom_components/js/load_dropdown_options.js"></script>
    <!-- Task timer -->
    <script src="/custom_components/js/tasktimer.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

    {{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    <script>
        function postData(id, data) {
            if (data == 'start')
                location.href = "/task/start/" + id;
            else if (data == 'pause')
                location.href = "/task/pause/" + id;
            else if (data == 'end')
                location.href = "/task/end/" + id;
        }

        $(function () {
            // hide end button when page load
            //$("#end-button").show();
            //Initialize Select2 Elements
            $(".select2").select2();

            $('#Apply').click(function () {
                location.href = '/leave/application';
            });

            $('#ticket').click(function () {
                location.href = '/helpdesk/ticket';
            });


            //initialise matchHeight on widgets
            //$('.same-height-widget').matchHeight();

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
            $(window).on('resize', function () {
                $('.modal:visible').each(reposition);
            });

            $(function () {
                $('img').on('click', function () {
                    $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
                    $('#enlargeImageModal').modal('show');
                });
            });
//            CKEDITOR.replace('summary');
            //widgets permissions
            var isSuperuser = parseInt({{ (int) $isSuperuser }}),
                isDivHead = parseInt({{ (int) $isDivHead }}),
                isSupervisor = parseInt({{ (int) $isSupervisor }}),
                canViewCPWidget = parseInt({{ (int) $canViewCPWidget }}),
                canViewTaskWidget = parseInt({{ (int) $canViewTaskWidget }}),
                canViewEmpRankWidget = parseInt({{ (int) $canViewEmpRankWidget }});

            @if($activeModules->where('code_name', 'appraisal')->first())
            //Employees ranking widget
            if (canViewEmpRankWidget == 1) {
                //Load divisions drop down
                var parentDDID = '';
                var loadAllDivs = 1;
                var firstDivDDID = null;
                var parentContainer = $('#empPerformanceRankingWidgetBox');
                @foreach($divisionLevels as $divisionLevel)
                //Populate drop down on page load
                var ddID = '{{ 'division_level_' . $divisionLevel->level }}';
                var postTo = '{!! route('divisionsdropdown') !!}';
                var selectedOption = '';
                //var divLevel = parseInt('{{ $divisionLevel->level }}');
                var incInactive = -1;
                var loadAll = loadAllDivs;
                        @if($loop->first)
                var selectFirstDiv = 1;
                var divHeadSpecific;
                if (isSuperuser) divHeadSpecific = 0;
                else if (isDivHead) divHeadSpecific = 1;
                loadDivDDOptions(ddID, selectedOption, parentDDID, incInactive, loadAll, postTo, selectFirstDiv, divHeadSpecific, parentContainer);
                //firstDivDDID = ddID;
                @else
                loadDivDDOptions(ddID, selectedOption, parentDDID, incInactive, loadAll, postTo, null, null, parentContainer);
                @endif
                //parentDDID
                parentDDID = ddID;
                loadAllDivs = -1;
                @endforeach

                //Load top ten performing employees (widget)
                //var topTenList = $('#emp-top-ten-list');
                //loadEmpListPerformance(topTenList, 0, 0, true);

                //Load Bottom ten performing employees (widget)
                //var bottomTenList = $('#emp-bottom-ten-list');
                //var totNumEmp = parseInt('{{ $totNumEmp }}');
                //loadEmpListPerformance(bottomTenList, 0, 0, false, true, totNumEmp);
            }

            if (canViewTaskWidget == 1) {
                //Load divisions drop down
                var parentDDID = '';
                var loadAllDivs = 1;
                var firstDivDDID = null;
                var parentContainer = $('#emptasksWidgetBox');
                @foreach($divisionLevels as $divisionLevel)
                //Populate drop down on page load
                var ddID = '{{ 'division_level_' . $divisionLevel->level }}';
                var postTo = '{!! route('divisionsdropdown') !!}';
                var selectedOption = '';
                //var divLevel = parseInt('{{ $divisionLevel->level }}');
                var incInactive = -1;
                var loadAll = loadAllDivs;
                        @if($loop->first)
                var selectFirstDiv = 1;
                var divHeadSpecific = 1;
                if (isSuperuser) divHeadSpecific = 0;
                else if (isDivHead) divHeadSpecific = 1;
                loadDivDDOptions(ddID, selectedOption, parentDDID, incInactive, loadAll, postTo, selectFirstDiv, divHeadSpecific, parentContainer);
                firstDivDDID = ddID;
                @else
                loadDivDDOptions(ddID, selectedOption, parentDDID, incInactive, loadAll, postTo, null, null, parentContainer);
                @endif
                //parentDDID
                parentDDID = ddID;
                loadAllDivs = -1;
                @endforeach
            }

            //Draw employee performance graph
            var empID = parseInt('{{ $user->person->id }}');
            var empChartCanvas = $('#empMonthlyPerformanceChart');
            var loadingWheel = $('#loading_overlay_emp_monthly_appraisal');
            var empAppraisedMonthList = $('#emp-appraised-month-list');
            loadEmpMonthlyPerformance(empChartCanvas, empID, loadingWheel, empAppraisedMonthList);

            //Company appraisal
            if (canViewCPWidget == 1) {
                //Draw divisions performance graph [Comp Appraisal Widget]
                var rankingList = $('#ranking-list');
                var divChartCanvas = $('#divisionsPerformanceChart');
                var loadingWheelCompApr = $('#lo_company_appraisal');
                var managerID = parseInt({{ $user->person->id }});
                if (isSuperuser == 1) {
                    var divLevel = parseInt('{{ $topGroupLvl->id }}');
                    loadDivPerformance(divChartCanvas, rankingList, divLevel, null, null, loadingWheelCompApr);
                }
                else if (isDivHead == 1) {
                    var divLevel = parseInt({{ $managedDivsLevel->level }});
                    loadDivPerformance(divChartCanvas, rankingList, divLevel, null, managerID, loadingWheelCompApr);
                }
                else if (isSupervisor) {
                    $('#topLvlDivGraphAndRankingRow').hide();
                    var staffPerfRow = $('#myStaffPerformanceRankingRow');
                    staffPerfRow.show();
                    rankingList = staffPerfRow.find('#my-staff-ranking-list');
                    loadEmpListPerformance(rankingList, 0, 0, false, false, null, managerID, loadingWheelCompApr);
                }

                //show performance of sub division levels on modals (modal show) [Comp Appraisal Widget]
                var i = 1;
                for (i; i <= 4; i++) {
                    $('#sub-division-performance-modal-' + i).on('show.bs.modal', function (e) {
                        var linkDiv = $(e.relatedTarget);
                        var modalWin = $(this);
                        subDivOnShow(linkDiv, modalWin);
                    });
                    $('#sub-division-performance-modal-' + i).on('hidden.bs.modal', function (e) {
                        $('#lo-sub-division-performance-modal-' + i).show();
                    });
                }

                //show performance of employees on modals [Comp Appraisal Widget]
                $('#emp-list-performance-modal').on('show.bs.modal', function (e) {
                    var linkDiv = $(e.relatedTarget);
                    var modalWin = $(this);
                    var loadingWheelEmpList = $('#lo-emp-list-performance-modal');
                    empPerOnShow(linkDiv, modalWin);
                });
                $('#emp-list-performance-modal').on('hidden.bs.modal', function (e) {
                    $('#lo-emp-list-performance-modal').show();
                });

                //show employee monthly performance on modal [Comp Appraisal Widget]
                $('#emp-year-performance-modal').on('show.bs.modal', function (e) {
                    var linkDiv = $(e.relatedTarget);
                    var empID = parseInt(linkDiv.data('emp_id'));
                    var empName = linkDiv.data('emp_name');
                    var empChartCanvas = $('#empMonthlyPerformanceModalChart');
                    var loadingWheel = $('#lo-emp-year-performance-modal');
                    var empAppraisedMonthList = $('#emp-appraised-month-modal-list');
                    var modalWin = $(this);
                    modalWin.find('#emp-year-modal-title').html(empName + '  - Appraisal');
                    loadEmpMonthlyPerformance(empChartCanvas, empID, loadingWheel, empAppraisedMonthList);
                });
                $('#emp-year-performance-modal').on('hidden.bs.modal', function (e) {
                    $('#lo-emp-year-performance-modal').show();
                });
            }

            var newsID;
            $('#View-news-modal').on('show.bs.modal', function (e) {
                //console.log('kjhsjs');
                var btnEdit = $(e.relatedTarget);
                newsID = btnEdit.data('id');
                var name = btnEdit.data('name');
                var description = btnEdit.data('description');
                var summary = $('<textarea />').html(btnEdit.data('summary')).text();
                var modal = $(this);
                modal.find('#name').val(name);
                modal.find('#description').val(description);
                modal.find('#summary').val(summary);
            });
            //Show available perks on the perks widget
            var perksWidgetList = $('#perks-widget-list');
            loadAvailablePerks(perksWidgetList);

            //Show perk details
            $('#edit-perk-modal').on('show.bs.modal', function (e) {
                var perkLink = $(e.relatedTarget);
                var modal = $(this);
                perkDetailsOnShow(perkLink, modal);
            });
            @endif

            @if($activeModules->where('code_name', 'leave')->first())
            //leave status (widget)
            var LeaveStatus = $('#leave-status-list');
            //loadLeaveStatus();

            //leave cancellation reason form on show
            var cancelApplicationModal = $('#cancel-leave-application-modal');
            var leaveApplicationID;
            cancelApplicationModal.on('show.bs.modal', function (e) {
                //console.log('gets here');
                var btnCancel = $(e.relatedTarget);
                leaveApplicationID = btnCancel.data('leave_application_id');
                //var modal = $(this);
                //modal.find('#task_id').val(taskID);
            });

            //perform leave application cancellation
            cancelApplicationModal.find('#cancel-leave-application').on('click', function () {
                var strUrl = '/leave/application/' + leaveApplicationID + '/cancel';
                var formName = 'cancel-leave-application-form';
                var modalID = 'cancel-leave-application-modal';
                var submitBtnID = 'cancel-leave-application';
                var redirectUrl = '/';
                var successMsgTitle = 'Leave Application Cancelled!';
                var successMsg = 'Your leave application has been cancelled!';
                modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
            });
            @endif

            @if($activeModules->whereIn('code_name', ['induction', 'tasks', 'meeting'])->first())
            document.getElementById("notes").placeholder = "Enter Task Note or Summary";
            //Post end task form to server using ajax (add)
            var taskID;
            var employeeID;
            var uploadRequired;
            $('#end-task-modal').on('show.bs.modal', function (e) {
                var btnEnd = $(e.relatedTarget);
                taskID = btnEnd.data('task_id');
                employeeID = btnEnd.data('employee_id');
                uploadRequired = btnEnd.data('upload_required');
                var modal = $(this);
                modal.find('#task_id').val(taskID);
                modal.find('#employee_id').val(employeeID);
                modal.find('#upload_required').val(uploadRequired);
            });

            $('#end-task').on('click', function () {
                endTask(taskID);
                /*
                var strUrl = '/task/end';
                var formName = 'end-task-form';
                var modalID = 'end-task-modal';
                var submitBtnID = 'end-task';
                var redirectUrl = '/';
                var successMsgTitle = 'Task Ended!';
                var successMsg = 'Task has been Successfully ended!';

                modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
                */
            });

            $('#close-task-modal').on('show.bs.modal', function (e) {
                var btnEnd = $(e.relatedTarget);
                taskID = btnEnd.data('task_id');
                var modal = $(this);
                modal.find('#task_id').val(taskID);
            });

            $('#close-task').on('click', function () {
                var strUrl = '/task/check';
                var formName = 'close-task-form';
                var modalID = 'close-task-modal';
                var submitBtnID = 'close-task';
                var redirectUrl = '/';
                var successMsgTitle = 'Task Checked!';
                var successMsg = 'Task has been Successfully checked!';
                modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
            });

            //Launch counter for running tasks
            @foreach($tasks as $task)
            increment({{ $task->task_id }});
            @endforeach
            @endif

            //Show success action modal
            //$('#success-action-modal').modal('show');

            $(window).load(function () {
                $('#myCarousel').carousel({
                    interval: 5000
                })
            });
        });
    </script>
@endsection