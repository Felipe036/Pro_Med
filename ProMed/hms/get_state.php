<?php
include('include/config.php');
if(!empty($_POST["stateid"]))
{
    $con=new conexao();
    $con->conect();

    $sql=mysqli_query($con->bd,"select Uf,Id from states where =Nome'".$_POST['stateid']."'");?>
    <option selected="selected">Selecione Cidade </option>
    <?php
    $con=new conexao();
    $con->conect();
    while($row=mysqli_fetch_array($sql))
    {?>
        <option value="<?php
        $con=new conexao();
        $con->conect();
        echo htmlentities($row['Id']); ?>"><?php echo htmlentities($row['Nome']); ?></option>
        <?php
    }
}
?>
