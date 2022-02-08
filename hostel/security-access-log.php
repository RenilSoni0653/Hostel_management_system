<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Access Log</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('security-sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top: 2%">Access Log</h2>
						<div class="panel panel-default">
							<div class="panel-heading">
								Student Entries
							</div>
							
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
									
										<tr>
											<th>Sno.</th>
											<th>Student Id</th>
											<th>Student Name</th>
											<th>Time In</th>
											
											
										</tr>
									</thead>
									
									
									<tbody>
<?php	
$aid=$_SESSION['id'];
//$ret="select * from sec_timein  JOIN (select * from sec_timeout )tout JOIN (select * from registration )reg on sec_timein.studid=tout.studid and sec_timein.studid=reg.id";
$ret="select * from sec_timein  JOIN (select * from registration )reg on  sec_timein.studid=reg.id";
//$ret="select * from sec_timein  JOIN (select * from registration where sec_timein.studid=registration.id  UNION select * from sec_timeout )reg on sec_timein.studid=sec_timeout.studid ";
//$mysqli->query($ret);
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
									<tr>
									<td><?php echo $cnt?></td>
									<td><?php echo $row->studid;?></td>
									<td><?php echo $row->firstName;?><?php echo $row->middleName;?><?php echo $row->lastName;?></td>
									<?php if($row->timein!=null){ ?>
									<td><?php echo $row->timein;?></td>
									<?php } ?>
									

										</tr>
									<?php
									$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>
						
				
				<br><br>

						<div class="panel panel-default">
							<div class="panel-heading">Student Entries</div>
							<div class="panel-body">
								<table id="zctb1" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
									
										<tr>
											<th>Sno.</th>
											<th>Student Id</th>
											<th>Student Name</th>
											<th>Time out</th>
											
											
										</tr>
									</thead>
									
									
									<tbody>
<?php	
$aid=$_SESSION['id'];
//$ret="select * from sec_timein  JOIN (select * from sec_timeout )tout JOIN (select * from registration )reg on sec_timein.studid=tout.studid and sec_timein.studid=reg.id";
$ret="select * from sec_timeout  JOIN (select * from registration )reg on  sec_timeout.studid=reg.id";
//$ret="select * from sec_timein  JOIN (select * from registration where sec_timein.studid=registration.id  UNION select * from sec_timeout )reg on sec_timein.studid=sec_timeout.studid ";
//$mysqli->query($ret);
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>

									<tr>
									<td><?php echo $cnt?></td>
									<td><?php echo $row->studid;?></td>
									<td><?php echo $row->firstName;?><?php echo $row->middleName;?><?php echo $row->lastName;?></td>
									<?php if($row->timeout!=null){ ?>
									<td><?php echo $row->timeout;?></td>
									<?php } ?>
									

										</tr>
									<?php
									$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script src="js/main1.js"></script>

</body>

</html>
