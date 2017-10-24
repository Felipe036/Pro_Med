<?php
require_once("include/config.php");
if(!empty($_POST["email"])) {
    $con=new conexao();
    $con->conect();

    $email= $_POST["email"];

    $result =mysqli_query($con->bd,"SELECT emailuser FROM users WHERE emailuser='$email'");
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        echo "<span style='color:red'> Email já registrado .</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{

        echo "<span style='color:green'> Email disponivel para registro .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}


?>
