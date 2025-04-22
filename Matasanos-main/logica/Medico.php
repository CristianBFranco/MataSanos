<?php
require_once("persistencia/Conexion.php");
require("persistencia/MedicoDAO.php");
require("Persona.php");

class Medico extends Persona {
    private $especialidad;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $especialidad = "") {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->especialidad = $especialidad;
    }

    public function getEspecialidad() {
        return $this->especialidad;
    }


    public function consultarPorEspecialidad($Especialidad_id) {
        $conexion = new Conexion();
        $medicoDAO = new MedicoDAO();
        $conexion->abrir();
        $conexion->ejecutar($medicoDAO->consultarPorEspecialidad($Especialidad_id));
        
        $medicos = array();
        while(($datos = $conexion->registro()) != null){
            
            $medicos[] = array("nombre" => $datos[0], "apellido" => $datos[1]);
        }
    
        $conexion->cerrar();
        return $medicos;
    }
    
}
?>
