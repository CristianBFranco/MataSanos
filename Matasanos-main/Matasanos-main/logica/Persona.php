<?php

abstract class Persona {
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $telefono;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $telefono = "") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

   
}

?>
