<?php
include('include/config.php');
if(!empty($_POST["stateid"]))
{
    $con=new conexaoadmin();
    $con->conect();

    $sql=mysqli_query($con->bd,"select Nome,Uf from states where =Uf'".$_POST['stateid']."'");?>
    <option selected="selected">Selecione Cidade </option>
    <?php
    $con=new conexaoadmin();
    $con->conect();
    while($row=mysqli_fetch_array($sql))
    {?>
        <option value="<?php
        $con=new conexaoadmin();
        $con->conect();
        echo htmlentities($row['Uf']); ?>"><?php
            $con=new conexaoadmin();
            $con->conect();
            echo htmlentities($row['Nome']); ?></option>
        <?php
    }
}
?>
