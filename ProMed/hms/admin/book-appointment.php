<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
    $con=new conexaoadmin();
    $con->conect();

    $specilization=$_POST['doctorSpecialization'];
    $doctorid=$_POST['doctor'];
    $userid=$_SESSION['id'];
    $appdate=$_POST['appdate'];
    $time=$_POST['apptime'];
    $docstatus=1;
    $userstatus=1;
    $con=new conexaoadmin();
    $con->conect();
    $sql=mysqli_query($con->bd,"INSERT into appointment(doctorSpecialization,doctorId,userId,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$appdate','$time','$userstatus','$docstatus')");
    if($sql)
    {
        echo "<script>alert('Consulta agendada com sucesso');</script>";
        echo "<script language=\"javascript\">
                document.location=\"appointment-history.php\";
              </script>";
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Paciente  | Reservas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<script>
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>

    </head>
	<body>
		<div id="app">
<?php include('include/sidebar.php');?>
			<div class="app-content">

						<?php include('include/header.php');?>

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Paciente | Reservas</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Paciente</span>
									</li>
									<li class="active">
										<span>Reservas</span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">

									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Reservas</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php
                                    $con=new conexaoadmin();
                                    $con->conect();
                                    echo htmlentities($_SESSION['msg1']);?>
								<?php
                                    $con=new conexaoadmin();
                                    $con->conect();
                                    echo htmlentities($_SESSION['msg1']="");?></p>
													<form role="form" name="book" method="post" >



<div class="form-group">
															<label for="doctorSpecialization">
																Especialização do Médico
															</label>
							<select name="doctorSpecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
																<option value="">Selecione Especialização</option>
                                            <?php
                                            $con=new conexaoadmin();
                                            $con->conect();
                                            $ret=mysqli_query($con->bd,"SELECT * FROM doctorspecilization");
                                            while($row=mysqli_fetch_array($ret))
                                            {

                                            ?>
																<option value="<?php
                                                                $con=new conexaoadmin();
                                                                $con->conect();
                                                                echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>

															</select>
														</div>
<div class="form-group">
															<label for="doctor">
																Médicos
															</label>
						<select name="doctor" class="form-control" id="doctor" required="required">
						<option value="">Selecione Médico</option>
						</select>
														</div>
<div class="form-group">
                                                                    <label for="id">
                                                                        Pacientes
                                                                    </label>
                                                                    <select name="id" class="form-control" required="required">
                                                                        <option>Selecione Paciente</option>
                                                                        <?php
                                                                        $con=new conexaoadmin();
                                                                        $con->conect();

                                                                        $ret=mysqli_query( $con->bd,"SELECT * FROM users");
                                                                        while($row=mysqli_fetch_array($ret))
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo htmlentities($row['id']);?> - <?php echo htmlentities($row['fullName']);?>">
                                                                        <?php echo htmlentities($row['id']);?> - <?php echo htmlentities($row['fullName']);?>
                                                                    </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>

<div class="form-group">
															<label for="AppointmentDate">
																Data
															</label>
									<input class="form-control datepicker" name="appdate"  type="date" required="required">
														</div>

<div class="form-group">
															<label for="Appointmenttime">

														Hora

															</label>
									<input class="form-control datepicker" name="apptime" type="time" required="required">
														</div>

														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Enviar
														</button>
													</form>
												</div>
											</div>
										</div>

											</div>
										</div>

									</div>
								</div>
					</div>
				</div>
			</div>
	<?php include('include/footer.php');?>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
