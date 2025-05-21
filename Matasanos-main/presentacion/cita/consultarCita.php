<?php
$id = $_SESSION["id"];
$rol = $_SESSION["rol"];


if (isset($_POST["idCita"]) && isset($_POST["nuevoEstado"])) {
    $idCita = $_POST["idCita"];
    $nuevoEstado = $_POST["nuevoEstado"];

    $cita = new Cita();
    $cita->actualizarEstado($idCita, $nuevoEstado);

   
    header("Location: " . $_SERVER["REQUEST_URI"]);
    exit();
}
?>





<body>
	<?php
	include("presentacion/encabezado.php");
	include("presentacion/menu" . ucfirst($rol) . ".php");
	?>
	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h4>Citas</h4>
					</div>
					<div class="card-body">
						<?php
						$cita = new Cita();
						$citas = $cita->consultar($rol, $id);
						$estadoCita = new EstadoCita();
						$estados = $estadoCita->consultarEstado();

						echo "<table class='table table-striped table-hover'>";
						echo "<tr><td>Id</td><td>Fecha</td><td>Hora</td>";
						if ($rol != "paciente") {
							echo "<td>Paciente</td>";
						}
						if ($rol != "medico") {
							echo "<td>Medico</td>";
						}
						echo "<td>Consultorio</td>";
						echo "<td>Estado</td></tr>";

						foreach ($citas as $cit) {
							echo "<tr>";
							echo "<td>" . $cit->getId() . "</td>";
							echo "<td>" . $cit->getFecha() . "</td>";
							echo "<td>" . $cit->getHora() . "</td>";

							if ($rol != "paciente") {
								echo "<td>" . $cit->getPaciente()->getNombre() . " " . $cit->getPaciente()->getApellido() . "</td>";
							}
							if ($rol != "medico") {
								echo "<td>" . $cit->getMedico()->getNombre() . " " . $cit->getMedico()->getApellido() . "</td>";
							}

							echo "<td>" . $cit->getConsultorio()->getNombre() . "</td>";

							
							echo "<td>";
							if ($rol == "admin" || $rol == "medico") {
								echo "<form method='post' action=''>";
								echo "<input type='hidden' name='idCita' value='" . $cit->getId() . "'>";
								echo "<select name='nuevoEstado' onchange='this.form.submit()' class='form-select form-select-sm'>";
								foreach ($estados as $estadoObj) {
									$selected = ($cit->getEstado()->getId() == $estadoObj->getId()) ? "selected" : "";
									echo "<option value='" . $estadoObj->getId() . "' $selected>" . $estadoObj->getValor() . "</option>";
								}
								echo "</select>";
								echo "</form>";
							} else {
								echo $cit->getEstado()->getValor();
							}
							echo "</td>";

							echo "</tr>";
						}
						echo "</table>";
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
