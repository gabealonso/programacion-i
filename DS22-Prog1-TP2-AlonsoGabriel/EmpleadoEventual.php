<?php
require_once 'Empleado.php';

class EmpleadoEventual extends Empleado
{
    /**
     * 
     * @var $ventas cantidad de ventas en array
     *
     */
    private $ventas;

    /**
     * 
     * const $comision comision de ventas
     *
     */
    private const COMISION = 0.05;

    public function __construct($nombre, $apellido, $dni, $salario, $ventas)
    {
        parent::__construct($nombre, $apellido, $dni, $salario);
        $this->ventas = $ventas;
    }

    public function calcularComision()
    {
        return self::COMISION * 100 . "%";
    }

    public function calcularVentas()
    {
        $total = 0;
        foreach($this->ventas as $v)
        {
            $total += $v;
        }
        return $total;
    }

    public function calcularIngresoTotal()
    {
        return $this->salario + $this->calcularVentas() * self::COMISION;
    }
}

