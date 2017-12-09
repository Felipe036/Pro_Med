<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
    $con=new conexao();
    $con->conect();

    $fname=$_POST['fname'];
    $addressuser=$_POST['addressuser'];
    $cityuser=$_POST['cityuser'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $sql=mysqli_query($con->bd,"Update users set fullName='$fname',addressuser='$addressuser',cityuser='$cityuser',gender='$gender',password='$password' where emailuser='".$_SESSION['login']."'");
    if($sql)
    {
        echo "<script>alert('Seu perfil foi atualizado com sucesso!');</script>";
        echo "<script language=\"javascript\">
                document.location=\"dashboard.php\";
              </script>";

    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Paciente | Ediar Perfil</title>
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
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Paciente | Editar Perfil</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Paciente </span>
									</li>
									<li class="active">
										<span>Editar Perfil</span>
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
													<h5 class="panel-title">Editar Perfil</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysqli_query($con->bd,"select * from users where emailuser='".$_SESSION['login']."'");
while($data=mysqli_fetch_array($sql))
{
?>
													<form role="form" name="edit" method="post">
													

<div class="form-group">
															<label for="fname">
																 Nome completo
															</label>
	<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
														</div>


<div class="form-group">
															<label for="addressuser">
																 Endereço
															</label>
					<textarea name="addressuser" class="form-control"><?php echo htmlentities($data['addressuser']);?></textarea>
														</div>
<div class="form-group">
															<label for="cityuser">
																 Cidade
															</label>
		<input type="text" name="cityuser" class="form-control" required="required"  value="<?php echo htmlentities($data['cityuser']);?>" >
														</div>

<div class="form-group">
									<label for="gender">
																Gênero
															</label>
					<input type="text" name="gender" class="form-control" required="required"  value="<?php echo htmlentities($data['gender']);?>">
														</div>

<div class="form-group">
                                                            <label for="fess">
                                                                Senha
                                                            </label>
                                                            <input type="password" name="password" class="form-control" value="<?php echo htmlentities($data['password']);?>">
                                                        </div>
<div class="form-group">
									<label for="fess">
																 Email
															</label>
					<input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['emailuser']);?>">
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
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
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
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
