<?php
include('include/config.php');
include('include/checklogin.php');
session_start();
//error_reporting(0);
if(isset($_POST['submit']))
{
    $con=new conexaodoutor();
    $con->conect();

    $docspecialization=$_POST['Doctorspecialization'];
    $docname=$_POST['docname'];
    $datadoc=$_POST['datadoc'];
    $crmdoc=$_POST['crmdoc'];
    $cpfdoc=$_POST['cpfdoc'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $doccontactno=$_POST['doccontact'];
    $docemail=$_POST['docemail'];
    $sql=mysqli_query($con->bd,"Update doctors set specilization='$docspecialization',doctorName='$docname',datadoc='$datadoc',crmdoc='$crmdoc',cpfdoc='$cpfdoc',address='$address',citydoc='$city',contactno='$doccontactno',docEmail='$docemail' where docEmail='".$_SESSION['dlogin']."'");
    if($sql)
    {
        echo "<script>alert('Detalhes do médico atualizados com sucesso');</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Médico | Editar Detalhes</title>
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


	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				<?php include('include/header.php');?>
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Médico | Editar Detalhes</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Médico</span>
									</li>
									<li class="active">
										<span>Detalhes</span>
									</li>
								</ol>
							</div>
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
													<h5 class="panel-title">Editar Médico</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysqli_query($con->bd,"select * from doctors where docEmail='".$_SESSION['dlogin']."'");
while($data=mysqli_fetch_array($sql))
{
?>
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Especialização
															</label>
							<select name="Doctorspecialization" class="form-control" required="required">
					<option value="<?php echo htmlentities($data['specilization']);?>">
					<?php echo htmlentities($data['specilization']);?></option>
<?php $ret=mysqli_query($con->bd,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

<div class="form-group">
															<label for="doctorname">
																 Nome completo
															</label>
	<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
														</div>

<div class="form-group">
                                                            <label for="datadoc">
                                                                Data de Nascimento
                                                            </label>
                                                            <input name=datadoc  type="date" class="form-control" value="<?php echo htmlentities($data['datadoc']);?>">
                                                        </div>

<div class="form-group">
                                                            <label for="crmdoctor">
                                                                CRM
                                                            </label>
                                                            <input type="text" name="crmdoc" class="form-control" maxlength="8" readonly="readonly" value="<?php echo htmlentities($data['crmdoc']);?>">
                                                        </div>

<div class="form-group">
                                                            <label for="cpfdoctor">
                                                                CPF
                                                            </label>
                                                            <input type="text" name="cpfdoc" class="form-control" maxlength="11" readonly="readonly" value="<?php echo htmlentities($data['cpfdoc']);?>">
                                                        </div>

<div class="form-group">
															<label for="address">
																Endereço
															</label>
					<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>

<div class="form-group">
                                                            <label for="city">
                                                                Cidade
                                                            </label>
                                                            <input type="text" name="city" class="form-control" value="<?php echo htmlentities($data['citydoc']);?>" >
                                                        </div>

<div class="form-group">
									<label for="fess">
																 Contatos
															</label>
					<input type="text" name="doccontact" class="form-control" required="required" maxlength="11" value="<?php echo htmlentities($data['contactno']);?>">
														</div>

<div class="form-group">
									<label for="fess">
																 Email
															</label>
					<input type="email" name="docemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['docEmail']);?>">
														</div>

														<?php } ?>

														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Atualizar
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
			<!-- start: FOOTER -->
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
