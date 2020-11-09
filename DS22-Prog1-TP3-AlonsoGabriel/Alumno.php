<?php
require_once 'IAlumno.php';
abstract class Alumno implements IAlumno
{
    protected $nombre;
    protected $apellido;
    protected $dni;

    public function __construct($nombre, $apellido, $dni)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
    }

    public function getNombreApellido()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function getDNI()
    {
        return $this->dni;
    }

    public function __toString()
    {
        return  "Nombre y Apellido: " . $this->nombre . " " . $this->apellido . ", " .
                "DNI: " . $this->dni . ", " . 
                "Nota final: " . $this->getNota();
    }
}