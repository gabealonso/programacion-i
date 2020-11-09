<?php
require_once 'Alumno.php';
class AlumnoPresencial extends Alumno
{
    protected $inasistencias;
    protected $notas;
    protected static $diasHabiles;

    public function __construct($nombre, $apellido, $dni, $inasistencias, $notas)
    {
        parent::__construct($nombre, $apellido, $dni);
        $this->inasistencias = $inasistencias;
        $this->notas = $notas;
    }

    public static function setDiasHabiles($diasH)
    {
        self::$diasHabiles = $diasH;
    }

    public function porcentajeAsistencia()
    {
        $asistencias = self::$diasHabiles - $this->inasistencias;
        $porcentajeAsistencias = $asistencias / self::$diasHabiles * 100;
        return $porcentajeAsistencias;
    }

    public function aprobado()
    {
        $aprueba = true;
        foreach($this->notas as $n)
        {
            if($n < 4)
            {
                $aprueba = false;
            }
        }
        return $aprueba;
    }
    
    public function calcularPromedio()
    {
        $suma = 0;
        $cont = 0;
        foreach($this->notas as $n)
        {
            $suma += $n;
            $cont++;
        }
        $promedio = $suma/$cont;
        return $promedio;
    }
    
    public function calcularNota()
    {
        $notaFinal = 0;
        if($this->porcentajeAsistencia() >= 75 && $this->aprobado() === true)
        {
            $notaFinal = $this->calcularPromedio();
        }elseif($this->porcentajeAsistencia() < 75){
            $notaFinal = 1;
        }elseif($this->aprobado() === false){
            $notaFinal = 1;
        }
        return $notaFinal;
    }
    
    public function getNota()
    {
        return $this->calcularNota();
    }
}