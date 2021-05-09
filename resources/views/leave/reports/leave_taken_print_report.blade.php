<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leave Taken Report Printed By {{ $user->person->first_name.' '. $user->person->surname }}</title>
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">
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
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Numéro d'employé</th>
							<th>Nom de l'employé</th>	
							<th>Type de congé</th>
							<th>Date prise</th>
							<th>Jour(s)</th>
						</tr>
					</thead>
                    <tbody>
					@if(count($leaveTakens) > 0)
						@foreach($leaveTakens as $leaveTaken)
							<tr>
							   <td>{{ !empty($leaveTaken->employee_number) ? $leaveTaken->employee_number : '' }}</td>
								<td>{{ !empty($leaveTaken->first_name) && !empty($leaveTaken->surname) ? $leaveTaken->first_name.' '.$leaveTaken->surname : '' }}</td>
								<td>{{ !empty($leaveTaken->leave_type_name) ? $leaveTaken->leave_type_name : '' }}</td>
								<td>{{ !empty($leaveTaken->start_date) ? date('Y M d : H : i : s', $leaveTaken->start_date) : '' }}</td>
								<td>{{ !empty($leaveTaken->leave_taken) ? number_format($leaveTaken->leave_taken/8, 2) : '' }} days(s)</td>
							</tr>
						@endforeach
					@endif
					</tbody>
                    <tfoot>
					<tfoot>
                    	<tr>
							<th>Numéro d'employé</th>
							<th>Nom de l'employé</th>	
							<th>Type de congé</th>
							<th>Date prise</th>
							<th>Jour(s)</th>
						</tr>
                    </tfoot>
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