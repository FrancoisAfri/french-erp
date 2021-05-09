<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Imprimée par {{ $user->person->first_name.' '. $user->person->surname }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bower_components/AdminLTE/dist/css/AdminLTE.min.css">
	<style type="text/css" media="print">
</style>
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <img width="196" height="60" src="{{ $company_logo }}" alt="logo">
                    <small class="pull-right">Date: {{$date}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-8 invoice-col">
                <address>
                    <strong>{{ $company_name }}</strong><br>
                </address>
            </div>
			<h3 class="box-title"></h3>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="box-body">
				<table class="table table-striped table-bordered">
					<tr>
						<td class="caption"><b>Type de congé</b></td>
						<td>{{ !empty($leave->leavetpe->name) ? $leave->leavetpe->name: '' }}</td>
						<td class="caption"><b>Employé</b></td>
						<td>{{ (!empty($leave->person->first_name)) ?  $leave->person->first_name.' '.$leave->person->surname : '' }}</td>
					</tr>
					<tr>
						<td class="caption"><b>Superviseur</b></td>
						<td>{{ (!empty($leave->manager->first_name)) ?  $leave->manager->first_name.' '.$leave->manager->surname : ''}}</td>
						<td class="caption"></td>
						<td></td>
					</tr>
					<tr>
						<td class="caption"><b>Dater de</b></td>
						<td>{{ !empty($leave->start_date) ? date(' d M Y', $leave->start_date) : '' }}</td>
						<td class="caption"><b>Date à</b></b></td>
						<td>{{ !empty($leave->end_date) ? date(' d M Y', $leave->end_date) : '' }}</td>
					</tr>
					<tr>
						<td class="caption"><b>Jour (s) demandé (s)</b></td>
						<td>{{ (!empty($leave->leave_taken)) ?  $leave->leave_taken / 8: ''}}</td>
						<td class="caption"><b>Remarque</b></td>
						<td>{{ !empty($leave->notes) ? $leave->notes : '' }}</td>
					</tr>
				</table>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>