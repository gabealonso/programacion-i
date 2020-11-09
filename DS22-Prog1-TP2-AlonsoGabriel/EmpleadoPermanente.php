<?php
require_once 'Empleado.php';

class EmpleadoPermanente extends Empleado
{
    private $fechaIngreso;

    public function __construct($nombre, $apellido, $dni, $salario, DateTime $fechaIngreso = null)
    {
        parent::__construct($nombre, $apellido, $dni, $salario);
        if (is_null($fechaIngreso)) {
            //Asigna hoy como fecha de ingreso:
            $this->fechaIngreso = new DateTime();
        }
        else {
            $this->fechaIngreso = $fechaIngreso;
        }
    }

    private function calcularAntiguedad() {
        //Retorna la antigüedad en años. (Puede ser cero.)
        $antiguedad = $this->fechaIngreso->diff(new DateTime()); 

        // $antiguedad está expresado en años, meses, días, horas, min, seg...
        // Pero nosotros retornaremos solamente los años ( ->y ):
        return $antiguedad->y;
    }

    public function calcularComision() {
        return "{$this->calcularAntiguedad()}%";
    }
    
    public function calcularIngresoTotal() {
      return $this->salario + $this->salario * $this->calcularAntiguedad()/100;
    }

}


