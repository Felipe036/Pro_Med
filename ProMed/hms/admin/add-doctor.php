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

	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$datadoc=$_POST['datadoc'];
$crmdoc=$_POST['crmdoc'];
$cpfdoc=$_POST['cpfdoc'];
$docrg=$_POST['docrg'];
$natura=$_POST['natura'];
$regiondoc=$_POST['regiondoc'];
$statedoc=$_POST['statedoc'];
$citydoc=$_POST['citydoc'];
$docaddress=$_POST['clinicaddress'];
$doccontactno=$_POST['doccontact'];
$genderdoc=$_POST['genderdoc'];
$docemail=$_POST['docemail'];
$password=($_POST['npass']);
$sql=mysqli_query($con->bd,"INSERT into doctors(specilization,doctorName,datadoc,crmdoc,cpfdoc,docrg,natura,regiondoc,statedoc, citydoc, address,contactno,genderdoc,docEmail,password) VALUES('$docspecialization','$docname','$datadoc','$crmdoc','$cpfdoc','$docrg','$natura','$regiondoc','$statedoc','$citydoc','$docaddress','$doccontactno','$genderdoc','$docemail','$password')");
if($sql)
{
echo "<script>alert('Médico adicionado com sucesso!');</script>";
    echo "<script language=\"javascript\">
                document.location=\"manage-doctors.php\";
              </script>";

}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin | Adicionar Médico</title>
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
    <script type="text/javascript" src="assets/js/MascaraValidacao.js"></script>
    <script type="text/javascript">
    function valid()
    {
     if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
    {
    alert("Senha e Confirmar senha não coincidem  !!");
    document.adddoc.cfpass.focus();
    return false;
    }
    return true;
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
									<h1 class="mainTitle">Admin | Adicionar Médico</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Adicionar Médico</span>
									</li>
								</ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Cadastro Médico</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Especialização do Médico
															</label>
							<select name="Doctorspecialization" class="form-control" required="required">
																<option value="">Selecionar Especialização</option>
                                    <?php
                                    $con=new conexaoadmin();
                                    $con->conect();

                                    $ret=mysqli_query( $con->bd,"select * from doctorspecilization");
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
																 Nome Completo
															</label>
					<input type="text" name="docname" class="form-control"  placeholder="Nome Completo">
														</div>
<div class="form-group">
                                                            <label for="datadoc">
                                                                Data de Nascimento
                                                            </label>
                                                            <input class="form-control" name=datadoc  type="date" required="required">
                                                        </div>

<div class="form-group">
                                                            <label for="crmdoctor">
                                                                CRM
                                                            </label>
                                                            <input type="text" name="crmdoc" class="form-control"  placeholder="Digite CRM" maxlength="8">
                                                        </div>

<div class="form-group">
                                                            <label for="cpfdoctor">
                                                                CPF
                                                            </label>
                                                            <input tipe="text" name="cpfdoc" class="form-control" placeholder="Digite CPF" onKeyPress="MascaraCPF(adddoc.cpfdoc);" maxlength="14">
                                                        </div>
<div class="form-group">
                                                            <label for="rgdoctor">
                                                                RG
                                                            </label>
                                                            <input type="text" name="docrg" class="form-control"  placeholder="Digite RG" maxlength="16">
                                                        </div>
<div class="form-group">
                                                            <label for="naturadoctor">
                                                                Naturalidade
                                                            </label>
                                                            <input type="text" name="natura" class="form-control"  placeholder="Digite Naturalidade">
                                                        </div>
<div class="form-group">
                                                            <label for="regiondoc">
                                                                Nacionalidade
                                                            </label>
                                                            <select name="regiondoc" class="form-control" required="required">
                                                                <option value="">Selecionar Nacionalidade</option>
                                                                <?php
                                                                $con=new conexaoadmin();
                                                                $con->conect();

                                                                $ret=mysqli_query( $con->bd,"select * from region");
                                                                while($row=mysqli_fetch_array($ret))
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo htmlentities($row['paisNome']);?>">
                                                                        <?php echo htmlentities($row['paisNome']);?>
                                                                    </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
        <div class="form-group">
                                                                    <label for="statedoc">
                                                                        Estados
                                                                    </label>
                                                                    <select name="statedoc" class="form-control" onChange="getstate(this.value);" required="required">
                                                                        <option value="">Selecione Estado</option>
                                                                        <?php
                                                                        $con=new conexaoadmin();
                                                                        $con->conect();
                                                                        $ret=mysqli_query($con->bd,"SELECT * FROM states");
                                                                        while($row=mysqli_fetch_array($ret))
                                                                        {

                                                                            ?>
                                                                            <option value="<?php
                                                                            $con=new conexaoadmin();
                                                                            $con->conect();
                                                                            echo htmlentities($row['Nome']);?>">
                                                                                <?php echo htmlentities($row['Nome']);?>
                                                                            </option>
                                                                        <?php } ?>

                                                                    </select>
                                                                </div>
                                                        <div class="form-group">
                                                            <label for="citydoc">
                                                                Cidade
                                                            </label>
                                                            <input name="citydoc" class="form-control"  placeholder="Informe Cidade"></input>
                                                        </div>
<div class="form-group">
															<label for="address">
																 Endereço
															</label>
					<textarea name="clinicaddress" class="form-control"  placeholder="Seu endereço"></textarea>
</div>
	
<div class="form-group">
									<label for="fess">
																 Contato do Médico
															</label>
					<input type="text" name="doccontact" class="form-control"  placeholder="Contato" maxlength="11">
														</div>
    <div class="form-group">
        <label class="block">
            Gênero <i class="fa fa-venus-mars"></i>
        </label>
        <div class="clip-radio radio-primary">
            <input type="radio" id="rg-female" name="genderdoc" value="Feminino" >
            <label for="rg-female">
                Feminino
            </label>
            <input type="radio" id="rg-male" name="genderdoc" value="Masculino">
            <label for="rg-male">
                Masculino
            </label>
        </div>
    </div>

<div class="form-group">
									<label for="fess">
																 Email
															</label>
					<input type="email" name="docemail" class="form-control"  placeholder="Digite Email">
														</div>
														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Senha
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="Digite Senha" required="required">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword2">
																Confirme Senha
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirmar Senha" required="required">
														</div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Adicionar
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
		<script src="assets/js/main.js"></script>
		<script src="assets/js/form-elements.js"></script>
        <script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
				MascaraValidacao.init();
			});
		</script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	</body>
</html>
