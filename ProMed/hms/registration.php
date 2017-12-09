<?php
session_start();
include('include/config.php');
if(isset($_POST['submit']))
{
    $con=new conexao();
    $con->conect();

$fname=$_POST['fullname'];
$addressuser=$_POST['addressuser'];
$cityuser=$_POST['cityuser'];
$gender=$_POST['gender'];
$emailuser=$_POST['emailuser'];
$password=($_POST['password']);
$sql=mysqli_query($con->bd,"INSERT into users(fullName,addressuser,cityuser,gender,emailuser,password) VALUES ('$fname','$addressuser','$cityuser','$gender','$emailuser','$password')");
if($sql)
{
	echo "<script>alert('Registro realizado com sucesso, tente entrar agora!');</script>";
    echo "<script type='text/javascript'> document.location = header('location:user-login.php'); </script>";
}
}
?>


<!DOCTYPE html>
    <html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registro de Paciente</title>
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
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />




	</head>

	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<h2>Registro de paciente</h2>
				</div>
				<div class="box-register">
					<form name="registration" id="registration"  method="post">
						<fieldset>
							<legend>
								Inscrever-se
							</legend>
							<p>
                                Insira seus detalhes pessoais abaixo:
							</p>
							<div class="form-group">
                                <span class="input-icon">
								<input type="text" class="form-control" name="fullname" placeholder="Nome completo" required>
                                    <i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group">
                                 <span class="input-icon">
								<input type="text" class="form-control" name="addressuser" placeholder="Endereço" required>
                                       <i class="fa fa-home"></i> </span>
							</div>
							<div class="form-group">
                                 <span class="input-icon">
								<input type="text" class="form-control" name="cityuser" placeholder="Cidade" required>
                                     <i class="fa fa-globe"></i> </span>
							</div>
							<div class="form-group">
								<label class="block">
									Gênero <i class="fa fa-venus-mars"></i>
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="Feminino" >
									<label for="rg-female">
										Feminino
									</label>
									<input type="radio" id="rg-male" name="gender" value="Masculino">
									<label for="rg-male">
										Masculino
									</label>
								</div>
							</div>
							<p>
                                Insira os detalhes da sua conta abaixo:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="emailuser" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="password_again" placeholder="Senha novamente" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="contrato">
									<label for="agree">
										Eu aceito!
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
                                    Já tem uma conta?
                                    <a href="user-login.php">
										Login
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Cadastrar <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
                        <center><a class="btn btn-transparent-red" href="http://projetos/ProMed/">  Inicio <i class="fa fa-hospital-o"></i></a></center>
                    </form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> ProMed</span>
					</div>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>

	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

	</body>
	<!-- end: BODY -->
</html>