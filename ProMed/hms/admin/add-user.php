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

    $fullName=$_POST['fullName'];
    $datauser=$_POST['datauser'];
    $cpfuser=$_POST['cpfuser'];
    $rguser=$_POST['rguser'];
    $naturauser=$_POST['naturauser'];
    $regionuser=$_POST['regionuser'];
    $stateuser=$_POST['stateuser'];
    $cityuser=$_POST['cityuser'];
    $addressuser=$_POST['addressuser'];
    $contact=$_POST['contact'];
    $gender=$_POST['gender'];
    $emailuser=$_POST['emailuser'];
    $password=($_POST['npass']);
    $sql=mysqli_query($con->bd,"INSERT into users(fullName,datauser,cpfuser,rguser,naturauser,regionuser,stateuser,cityuser,addressuser,contact,gender,emailuser,password) VALUES('$fullName','$datauser','$cpfuser','$rguser','$naturauser','$regionuser','$stateuser','$cityuser','$addressuser','$contact','$gender','$emailuser','$password')");
    if($sql)
    {
        echo "<script>alert('Paciente adicionado com sucesso!');</script>";
        echo "<script language=\"javascript\">
                document.location=\"manage-users.php\";
              </script>";

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Adicionar Paciente</title>
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
            if(document.addusers.npass.value!= document.addusers.cfpass.value)
            {
                alert("Senha e Confirmar senha não coincidem  !!");
                document.addusers.cfpass.focus();
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
                            <h1 class="mainTitle">Admin | Adicionar Paciente</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Admin</span>
                            </li>
                            <li class="active">
                                <span>Adicionar Paciente</span>
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
                                            <h5 class="panel-title">Cadastro Paciente</h5>
                                        </div>
                                        <div class="panel-body">

                                            <form role="form" name="addusers" method="post" onSubmit="return valid();">
                                                <div class="form-group">
                                                    <label for="nameuser">
                                                        Nome Completo
                                                    </label>
                                                    <input type="text" name="fullName" class="form-control"  placeholder="Nome Completo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="datauser">
                                                        Data de Nascimento
                                                    </label>
                                                    <input class="form-control" name=datauser  type="date" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label for="cpfuser">
                                                        CPF
                                                    </label>
                                                    <input type="text" name="cpfuser" id="cpf" class="form-control" placeholder="Digite CPF">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rguser">
                                                        RG
                                                    </label>
                                                    <input type="text" name="rguser" class="form-control"  placeholder="Digite RG" maxlength="16">
                                                </div>
                                                <div class="form-group">
                                                    <label for="naturauser">
                                                        Naturalidade
                                                    </label>
                                                    <input type="text" name="naturauser" class="form-control"  placeholder="Digite Naturalidade">
                                                </div>
                                                <div class="form-group">
                                                    <label for="regionuser">
                                                        Nacionalidade
                                                    </label>
                                                    <select name="regionuser" class="form-control" required="required">
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
                                                    <label for="stateuser">
                                                        Estados
                                                    </label>
                                                    <select name="stateuser" class="form-control" required="required">
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
                                                    <label for="cityuser">
                                                        Cidade
                                                    </label>
                                                    <input name="cityuser" class="form-control"  placeholder="Informe Cidade"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addressuser">
                                                        Endereço
                                                    </label>
                                                    <textarea name="addressuser" class="form-control"  placeholder="Seu endereço"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contact">
                                                            Contato do Médico
                                                        </label>
                                                        <input type="text" name="contact" class="form-control"  placeholder="Contato" maxlength="11">
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

                                                    <div class="form-group">
                                                        <label for="email">
                                                            Email
                                                        </label>
                                                        <input type="email" name="emailuser" class="form-control"  placeholder="Digite Email">
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
    });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>
