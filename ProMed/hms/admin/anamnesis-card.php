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

    $name_user=$_POST['name_user'];
    $complaint=$_POST['complaint'];
    $historic=$_POST['historic'];
    $kidney_problem=$_POST['kidney_problem'];
    $heart_problem=$_POST['heart_problem'];
    $articular_problem=$_POST['articular_problem'];
    $breathing_problem=$_POST['breathing_problem'];
    $gastric_problem=$_POST['gastric_problem'];
    $allergies=$_POST['allergies'];
    $hepatites=$_POST['hepatites'];
    $pregnancy=$_POST['pregnancy'];
    $diabetes=$_POST['diabetes'];
    $healing_problem=$_POST['healing_problem'];
    $uses_medications=$_POST['uses_medications'];
    $sql=mysqli_query($con->bd,"INSERT into anamnesis(name_user,complaint,historic,kidney_problem,articular_problem,heart_problem,breathing_problem,gastric_problem,allergies,hepatites,pregnancy,diabetes,healing_problem,uses_medications) VALUES($name_user,$complaint,$historic,$kidney_problem,$articular_problem,$heart_problem,$breathing_problem,$gastric_problem,$allergies,$hepatites,$pregnancy,$diabetes,$healing_problem,$uses_medications)");
    if($sql)
    {
        echo "<script>alert('Anamnese adicionado com sucesso!');</script>";
        echo "<script type='text/javascript'> document.location = href('location:book-appointment.php'); </script>";

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Ficha Anamnese</title>
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
    <script type="text/javascript">
        function valid()
        {
            if(document.anamnesis.name_user.value!= document.anamnesis.name_user.value)
            {
                alert("Selecione Paciente!!");
                document.anamnesis.name_user.focus();
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
                            <h1 class="mainTitle">Admin | Ficha Anamnese</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Admin</span>
                            </li>
                            <li class="active">
                                <span>Ficha Anamnese</span>
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
                                            <h5 class="panel-title">Cadastrar Anamnese</h5>
                                        </div>
                                        <div class="panel-body">

                                            <form role="form" name="anamnesis" method="post" onSubmit="return valid();">
                                                <div class="form-group">
                                                    <label for="id_user">
                                                        Pacientes
                                                    </label>
                                                    <select name="name_user" class="form-control" required="required">
                                                        <option>Selecionar Paciente</option>
                                                        <?php
                                                        $con=new conexaoadmin();
                                                        $con->conect();

                                                        $ret=mysqli_query( $con->bd,"select * from users");
                                                        while($row=mysqli_fetch_array($ret))
                                                        {
                                                            ?>
                                                            <option value="<?php echo htmlentities($row['fullName']);?>">
                                                                <?php echo htmlentities($row['fullName']);?>
                                                            </option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="complaint">
                                                        Queixa Principal
                                                    </label>
                                                    <textarea name="complaint" class="form-control"  placeholder="Digite Queixa"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="historic">
                                                        Histórico
                                                    </label>
                                                    <textarea name="historic" class="form-control"  placeholder="Digite Histórico"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kidney_problem">
                                                        Problemas Renais
                                                    </label>
                                                    <textarea name="kidney_problem" class="form-control"  placeholder="Informe Problemas"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="articular_problem">
                                                        Problemas Articulares
                                                    </label>
                                                    <textarea name="articular_problem" class="form-control"  placeholder="Informe Problemas"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="heart_problem">
                                                        Problemas Cardíacos
                                                    </label>
                                                    <textarea name="heart_problem" class="form-control"  placeholder="Informe Problemas"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="breathing_problem">
                                                        Problemas Respiratórios
                                                    </label>
                                                    <textarea name="breathing_problem" class="form-control"  placeholder="Informe Problemas"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gastric-problem">
                                                        Problemas Gástricos
                                                    </label>
                                                    <textarea name="gastric_problem" class="form-control"  placeholder="Informe Problemas"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="allergies">
                                                        Alergias
                                                    </label>
                                                    <textarea name="allergies" class="form-control"  placeholder="Digite Alergia"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="uses_medications">
                                                        Utiliza Medicamentos
                                                    </label>
                                                    <textarea name="uses_medications" class="form-control"  placeholder="Informe Medicamentos"></textarea>
                                                </div>
                                                    <div class="form-group">
                                                        <label class="block">
                                                            Hepatite
                                                        </label>
                                                        <div class="clip-radio radio-primary">
                                                            <input type="radio" id="h-yes" name="hepatites" value="Sim" >
                                                            <label for="h-yes">
                                                                Sim
                                                            </label>
                                                            <input type="radio" id="h-no" name="hepatites" value="Nao">
                                                            <label for="h-no">
                                                                Não
                                                            </label>
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <label class="block">
                                                        Gravidez
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" id="p-yes" name="pregnancy" value="Sim" >
                                                        <label for="p-yes">
                                                            Sim
                                                        </label>
                                                        <input type="radio" id="p-no" name="pregnancy" value="Nao">
                                                        <label for="p-no">
                                                            Não
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="block">
                                                        Diabetes
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" id="d-yes" name="diabetes" value="Sim" >
                                                        <label for="d-yes">
                                                            Sim
                                                        </label>
                                                        <input type="radio" id="d-no" name="diabetes" value="Nao">
                                                        <label for="d-no">
                                                            Não
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="block">
                                                        Problemas de Cicatrização
                                                    </label>
                                                    <div class="clip-radio radio-primary">
                                                        <input type="radio" id="c-yes" name="healing_problem" value="Sim" >
                                                        <label for="c-yes">
                                                            Sim
                                                        </label>
                                                        <input type="radio" id="c-no" name="healing_problem" value="Nao">
                                                        <label for="c-no">
                                                            Não
                                                        </label>
                                                    </div>
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
