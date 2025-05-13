<?php
if(!isset($_SESSION["id"]) || !isset($_SESSION["rol"]) || ($_SESSION["rol"] != "medico")){
    header("Location: index.php");
}
$id = $_SESSION["id"];
$medico = new Medico($id);
$medico -> consultar();
echo "Hola " . $medico -> getNombre() . " " . $medico -> getApellido();
echo "Usted tiene la especialidad: " . $medico -> getEspecialidad() -> getNombre();
?>