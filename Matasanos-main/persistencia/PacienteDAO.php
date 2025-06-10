<?php

class PacienteDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $fechaNacimiento;

    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $fechaNacimiento = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> fechaNacimiento = $fechaNacimiento;
    }

       
    public function autenticar(){
        return "select idPaciente
                from Paciente
                where correo = '" . $this -> correo . "' and clave = '" . md5($this -> clave) . "'";
    }
    
    public function consultar(){
        return "select p.nombre, p.apellido, p.correo, p.fechaNacimiento  
                from Paciente p
                where idPaciente = '" . $this -> id . "'";
    }

      /*public function buscar($filtro)
    {
        return "select p.idPaciente, p.nombre, p.apellido, p.correo
                from Paciente p
                where p.nombre like '%" . $filtro . "%' or p.apellido like '%" . $filtro . "%'";
    }*/

    public function buscar($filtro)
    {
        $filtro = trim($filtro);
        $palabras = explode(" ", $filtro);

        $sql = "SELECT p.idPaciente, p.nombre, p.apellido, p.correo FROM Paciente p WHERE ";

        if (count($palabras) == 1) {
            $sql .= "p.nombre LIKE '%" . $palabras[0] . "%' OR p.apellido LIKE '%" . $palabras[0] . "%'";
        } else {
            $condiciones = array();

            for ($i = 0; $i < count($palabras); $i++) {
                for ($j = 0; $j < count($palabras); $j++) {
                    if ($i != $j) {
                        $condiciones[] = "(p.nombre LIKE '%" . $palabras[$i] . "%' AND p.apellido LIKE '%" . $palabras[$j] . "%')";
                    }
                }
            }

            foreach ($palabras as $palabra) {
                $condiciones[] = "(p.nombre LIKE '%$palabra%' OR p.apellido LIKE '%$palabra%')";
            }

            $sql .= implode(" OR ", $condiciones);
        }

        return $sql;
    }
}
