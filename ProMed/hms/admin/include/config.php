<?php
class conexaoadmin
{
    public $hostname = "localhost";
    public $user = "root";
    public $password = "";
    public $database = "hms";
    public $bd;

    public function conect()
    {
        $this->bd = mysqli_connect($this->hostname, $this->user, $this->password) or die("Conexão não realizada");
        mysqli_select_db($this->bd, $this->database) or die("Banco não encontrado!");
    }
}
?>