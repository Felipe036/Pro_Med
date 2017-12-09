<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
    $con=new conexaodoutor();
    $con->conect();

    $userId=$_POST['userId'];
    $dataid=$_POST['dataid'];
    $hourid=$_POST['hourid'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $imc=$_POST['imc'];
    $temperature=$_POST['temperature'];
    $pain=$_POST['pain'];
    $sql=mysqli_query($con->bd,"INSERT into vitalsigns(userId,dateid,hourid,height,weight,imc,temperature,pain) VALUES('$userId','$dataid','$hourid','$height','$weight','$imc','$temperature','$pain')");
    if($sql)
    {
        echo "<script>alert('Sinais Vitais Cadastrado com Sucesso!');</script>";
        echo "<script language=\"javascript\">
                document.location=\"dashboard.php\";
              </script>";

    }else{
        echo "<script>alert('Sinais Vitais Cadastrado com Sucesso!');</script>";
        echo "<script language=\"javascript\">
                document.location=\"dashboard.php\";
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médico | Sinais Vitais</title>
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
    <link rel="stylesheet" href="assets/css/themes/theme-1.css"/>

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
                            <h1 class="mainTitle">Médico | Sinais Vitais</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Médico</span>
                            </li>
                            <li class="active">
                                <span>Sinais Vitais</span>
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
                                            <h5 class="panel-title">Cadastrar Sinais Vitais</h5>
                                        </div>
                                        <div class="panel-body">

                                            <form role="form" name="vitalsigns" method="post" onSubmit="return valid();">

                                                <div class="form-group">
                                                    <label for="userId">
                                                        Pacientes
                                                    </label>
                                                    <select name="userId" class="form-control" required="required">
                                                        <option>Selecione Paciente</option>
                                                        <?php
                                                        $con=new conexaodoutor();
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
                                                            <label for="datais">
                                                                Data
                                                            </label>
                                                            <input class="form-control" name=dataid type="date">
                                                </div>
                                                 <div class="form-group">
                                                            <label for="hourid">
                                                                Hora
                                                            </label>
                                                            <input class="form-control datepicker" name="hourid" type="time">
                                                 </div>

                                                <div class="form-group">
                                                    <label for="height">
                                                        Altura
                                                    </label>
                                                    <input type="text" name="height" class="form-control" placeholder="Digite Altura em Cm">
                                                </div>

                                                <div class="form-group">
                                                    <label for="weight">
                                                        Peso
                                                    </label>
                                                    <input type="text" name="weight" class="form-control" placeholder="Digite Peso em Kg">
                                                </div>

                                                <div class="form-group">
                                                    <label for="imc">
                                                        IMC
                                                    </label>
                                                    <input type="text" name="imc" class="form-control" placeholder="Digite IMC">
                                                </div>

                                                <div class="form-group">
                                                    <label for="temperature">
                                                        Temperatura em Graus Celsius
                                                    </label>
                                                    <input type="text" name="temperature" class="form-control" placeholder="Graus Celsius">
                                                </div>

                                                <div class="form-group">
                                                    <label for="pain">
                                                        Dor
                                                    </label>
                                                    <input type="text" name="pain" class="form-control" placeholder="Digite">
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
    });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>
