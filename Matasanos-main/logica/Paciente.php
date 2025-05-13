<?php
require_once("logica/Persona.php");

class Paciente extends Persona {
    private $foto;
    private $especialidad;

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = ""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
    }
    
}
