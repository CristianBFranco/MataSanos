<?php 
session_start();
require ("logica/Especialidad.php");
require ("logica/Medico.php");
require ("logica/Paciente.php");
require ("logica/Cita.php");
require ("logica/Consultorio.php");
require ("logica/Admin.php");


?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Matasanos EPS</title>

<!-- Bootstrap -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">

<!-- FontAwesome -->
<link href="https://use.fontawesome.com/releases/v6.7.2/css/all.css"
	rel="stylesheet">
</head>
<?php 
if(!isset($_GET["pid"])){
    include ("presentacion/inicio.php");
}else{
    include (base64_decode($_GET["pid"]));
}

    
?>

</html>

