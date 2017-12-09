<?php
session_start();
include('include/config.php');
$_SESSION['login']=="";
session_unset();
//session_destroy();
$_SESSION['msg']="Saida efetuada com sucesso!";
?>
<script language="javascript">
document.location="./user-login.php";
</script>
