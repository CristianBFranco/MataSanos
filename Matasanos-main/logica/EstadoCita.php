<?php
class EstadoCita{
    private $id;
    private $valor;
    
    public function getId(){
        return $this -> id;
    }
    
    public function getValor(){
        return $this -> valor;
    }
    
    public function __construct($id="", $valor=""){
        $this -> id = $id;
        $this -> valor = $valor;
    }     
    
    public function consultarEstado(){
        $conexion = new Conexion();
        $citaDAO = new CitaDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($citaDAO -> consultarEstado());
        $estados = array();
        while(($datos = $conexion -> registro()) != null){
            $estado = new EstadoCita($datos[0], $datos[1]);
            array_push($estados, $estado);
        }
        $conexion -> cerrar();
        return $estados;


    } 
}



?>