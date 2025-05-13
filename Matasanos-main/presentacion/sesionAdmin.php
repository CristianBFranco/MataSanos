<?php

if(!isset($_SESSION["id"]) || !isset($_SESSION["rol"]) || ($_SESSION["rol"] != "admin")){
    header("Location: index.php");
}
$id = $_SESSION["id"];
$admin = new Admin($id);
$admin -> consultar();
echo "Hola " . $admin -> getNombre() . " " . $admin -> getApellido();
?>


AQUI VA EL MENU