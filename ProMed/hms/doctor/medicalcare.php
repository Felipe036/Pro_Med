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
    $complaint=$_POST['complaint'];
    $historic=$_POST['historic'];
    $kidneyproblem=$_POST['kidneyproblem'];
    $articularproblem=$_POST['articularproblem'];
    $heartproblem=$_POST['heartproblem'];
    $breathingproblem=$_POST['breathingproblem'];
    $gastricproblem=$_POST['gastricproblem'];
    $allergies=$_POST['allergies'];
    $usesmedications=$_POST['usesmedications'];
    $hepatites=$_POST['hepatites'];
    $pregnancy=$_POST['pregnancy'];
    $diabetes=$_POST['diabetes'];
    $healingproblem=$_POST['healingproblem'];
    $con=new conexaodoutor();
    $con->conect();
    $sql=mysqli_query($con->bd,"INSERT into medicalcare(userId,complaint,historic,kidneyproblem,articularproblem,heartproblem,breathingproblem,gastricproblem,allergies,hepatites,pregnancy,diabetes,healingproblem,usesmedications) VALUES($userId','$complaint','$historic','$kidneyproblem','$articularproblem','$heartproblem','$breathingproblem','$gastricproblem','$allergies','$hepatites','$pregnancy','$diabetes','$healingproblem,'$usesmedications')");
    if($sql)
    {
        echo "<script>alert('Atendimento realizado com sucesso!');</script>";
        echo "<script language=\"javascript\">
                document.location=\"vital-signs.php\";
              </script>";
    }
    else{
        echo "<script>alert('Atendimento realizado com sucesso!');</script>";
        echo "<script language=\"javascript\">
                document.location=\"vital-signs.php\";
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médico | Atendimento</title>
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
                            <h1 class="mainTitle">Médico | Atendimento</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Médico</span>
                            </li>
                            <li class="active">
                                <span>Atendimento</span>
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
                                            <h5 class="panel-title">Realizar Atendimento</h5>
                                        </div>
                                        <div class="panel-body">

                                            <form role="form" name="medical" method="post">

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
                                                    <label for="complaint">
                                                        Queixa Principal
                                                    </label>
                                                    <textarea name="complaint" class="form-control"  placeholder="Digite a Queixa"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="historic">
                                                        Historico
                                                    </label>
                                                    <input class="form-control" name=historic  type="text" placeholder="Digite o Historico">
                                                </div>

                                                <div class="form-group">
                                                    <label for="kidneyproblem">
                                                        Problemas Renais
                                                    </label>
                                                    <input type="text" name="kidneyproblem" class="form-control" placeholder="Digite Problemas Renais">
                                                </div>
                                                <div class="form-group">
                                                    <label for="articularproblem">
                                                        Problemas Articulares
                                                    </label>
                                                    <input class="form-control" name=articularproblem  type="text" placeholder="Digite Problemas Articulares">
                                                </div>
                                                <div class="form-group">
                                                    <label for="heartproblem">
                                                        Problemas Cardíacos
                                                    </label>
                                                    <input class="form-control" name=heartproblem  type="text" placeholder="Digite Problemas Cardíacos">
                                                </div>
                                                <div class="form-group">
                                                    <label for="breathingproblem">
                                                        Problemas Respiratórios
                                                    </label>
                                                    <input class="form-control" name=breathingproblem  type="text" placeholder="Digite Problemas Respiratórios">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gastricproblem">
                                                        Problemas Gástricos
                                                    </label>
                                                    <input class="form-control" name=gastricproblem  type="text" placeholder="Digite Problemas Gástricos">
                                                </div>
                                                <div class="form-group">
                                                    <label for="allergies">
                                                        Alergias
                                                    </label>
                                                    <input class="form-control" name=allergies  type="text" placeholder="Digite Alergias">
                                                </div>
                                                <div class="form-group">
                                                    <label for="usesmedications">
                                                        Utiliza Medicamentos
                                                    </label>
                                                    <input class="form-control" name=usesmedications  type="text" placeholder="Digite Medicamentos">
                                                </div>
                                                <div class="form-group">
                                                    <label class="hepatites">
                                                        Hepatite
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" id="hp-yes" name="hepatites" value="Sim" >
                                                        <label for="hp-yes">
                                                            Sim
                                                        </label>
                                                        <input type="radio" id="hp-no" name="hepatites" value="Não">
                                                        <label for="hp-no">
                                                            Não
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="pregnancy">
                                                        Gravidez
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" id="pr-yes" name="pregnancy" value="Sim" >
                                                        <label for="pr-yes">
                                                            Sim
                                                        </label>
                                                        <input type="radio" id="pr-no" name="pregnancy" value="Não">
                                                        <label for="pr-no">
                                                            Não
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="diabetes">
                                                        Diabetes
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" id="db-yes" name="diabetes" value="Sim" >
                                                        <label for="db-yes">
                                                            Sim
                                                        </label>
                                                        <input type="radio" id="db-no" name="diabetes" value="Não">
                                                        <label for="db-no">
                                                            Não
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="healingproblem">
                                                        Hepatite
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" id="hpr-yes" name="healingproblem" value="Sim" >
                                                        <label for="hpr-yes">
                                                            Sim
                                                        </label>
                                                        <input type="radio" id="hpr-no" name="healingproblem" value="Não">
                                                        <label for="hpr-no">
                                                            Não
                                                        </label>
                                                    </div>
                                                </div>

                                                <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                    Atender
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
