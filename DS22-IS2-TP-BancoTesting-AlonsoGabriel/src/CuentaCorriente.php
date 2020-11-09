<?php
namespace App;
require_once 'Cuenta.php';
class CuentaCorriente extends Cuenta {
    private $topeDescubierto;

    public function __construct($numero, $titular, $saldoInicial, $topeDescubierto = 2000) {
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
        $this->topeDescubierto = $topeDescubierto;
    }

    public function extraer($monto) {
        if ($monto <= $this->saldo + $this->topeDescubierto) {
            return parent::extraer($monto);
        }
        else {
            return "Tope de descubierto excedido";
        }
    }
}          
