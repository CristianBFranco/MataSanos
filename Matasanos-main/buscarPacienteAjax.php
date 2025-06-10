<?php
require("logica/Persona.php");
require("logica/Paciente.php");

$filtro = $_GET["filtro"];
$paciente = new Paciente();
$pacientes = $paciente->buscar($filtro);

if (count($pacientes) > 0) {
    echo "<table class='table table-striped table-hover mt-3'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Correo</th></tr>";

    foreach ($pacientes as $pac) {
        echo "<tr>";
        echo "<td>" . $pac->getId() . "</td>";
        echo "<td>" . resaltarCoincidencias($pac->getNombre(), $filtro) . "</td>";
        echo "<td>" . resaltarCoincidencias($pac->getApellido(), $filtro) . "</td>";
        echo "<td>" . $pac->getCorreo() . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<div class='alert alert-danger mt-3' role='alert'>No hay resultados</div>";
}


function resaltarCoincidencias($texto, $filtro)
{
    $palabras = explode(" ", trim($filtro));
    foreach ($palabras as $palabra) {
        if (stripos($texto, $palabra) !== false) {
            $texto = preg_replace("/(" . preg_quote($palabra, '/') . ")/i", "<strong>$1</strong>", $texto);
        }
    }
    return $texto;
}
