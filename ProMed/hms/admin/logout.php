<?php
session_start();
$_SESSION['login']=="";
session_unset();
//session_destroy();
$_SESSION['msg']="Saida efetuada com sucesso!";
?>
<script language="javascript">
document.location="index.php";
</script>
