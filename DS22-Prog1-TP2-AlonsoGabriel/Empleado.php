<?php

require_once 'IPersona.php';

class Empleado implements IPersona
{
    protected $nombre;
    protected $apellido;
    protected $sector;
    protected $salario;
    protected $dni;

    public function __construct($nombre, $apellido, $dni, $salario, $sector="No especificado")
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->salario = $salario;
        $this->sector = $sector;
    }

    
    public function getNombreApellido() 
    {
        return $this->nombre . " " . $this->apellido;
    }

    public function getDNI()
    {
        return $this->dni;
    }
    
    public function getSalario()
    {
        return $this->salario;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function __toString(){
        return "Nombre del empleado {$this->nombre} {$this->apellido} \n DNI: {$this->dni}";
    }
}


