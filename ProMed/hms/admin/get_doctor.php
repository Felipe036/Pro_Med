<?php
include('include/config.php');
if(!empty($_POST["specilizationid"]))
{
    $con=new conexaoadmin();
    $con->conect();

    $sql=mysqli_query($con->bd,"select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'");?>
    <option selected="selected">Selecione Médico </option>
    <?php
    $con=new conexaoadmin();
    $con->conect();
    while($row=mysqli_fetch_array($sql))
    {?>
        <option value="<?php
        $con=new conexaoadmin();
        $con->conect();
        echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
        <?php
    }
}
?>
