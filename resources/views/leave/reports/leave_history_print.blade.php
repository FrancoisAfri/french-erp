<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leave History Report Printed By  {{ $user->person->first_name.' '. $user->person->surname }}</title>
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 -->
  <link rel="stylesheet" href="/bower_components/AdminLTE/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
       
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <div class="row">
	<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
		<div class="panel box box-primary">
			<div class="box-body">
				<table class="table table-striped">
					<tr>
						<th>Numéro d'employé</th>
						<th>Nom de l'employé</th>
						<th>Action</th>
						<th>Date de l'action</th>
						<th>Type de congé</th>
						<th>Solde précédent</th>
						<th>Transaction</th>
						<th>Solde actuel</th>
						<th>Exécuté par</th>
					</tr>
					@if(count($historyAudit) > 0)
						@foreach($historyAudit as $audit)
							<tr>
							   <td>{{ !empty($audit->employee_number) ? $audit->employee_number : '' }}</td>
								<td>{{ !empty($audit->firstname) && !empty($audit->surname) ? $audit->firstname.' '.$audit->surname : '' }}</td>
								<td>{{ !empty($audit->action) ? $audit->action : '' }}</td>
								<td>{{ !empty($audit->action_date) ? date('Y M d : H : i : s', $audit->action_date) : '' }}</td>
								<td>{{ !empty($audit->leave_type) ? $audit->leave_type : '' }}</td>
								<td>{{ !empty($audit->previous_balance) ? number_format($audit->previous_balance / 8, 2) : '' }}</td>
								<td>{{ !empty($audit->transcation) ? number_format($audit->transcation / 8, 2) : '' }}</td>
								<td>{{ !empty($audit->current_balance) ? number_format($audit->current_balance / 8, 2): '' }}</td>
								<td>{{ !empty($audit->added_by_name) ? $audit->added_by_name : '' }}</td>
							</tr>
						@endforeach
					@endif
				</table>
			</div>
		</div>

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>