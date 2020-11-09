<?php
require_once 'src/CuentaCorriente.php';
require_once 'src/CajaAhorro.php';
/** las clases de testing son subclases de TestCase */
/** cualquier método que comience con "test" será considerado un test por phpUnit */
class bancoTest extends \PHPUnit\Framework\TestCase
{
    /** Cuenta Corriente test suite */
    
    public function testCuentaCorrienteConsultarSaldo()
    {
        $cc = new \App\CuentaCorriente(123456, 'Fulano de Tal', 5000);
        $this->assertEquals(5000, $cc->getSaldo());
    }
    public function testCuentaCorrienteDeposito()
    {
        $cc = new \App\CuentaCorriente(123456, 'Fulano de Tal', 0);
        $this->assertEquals("Depósito realizado", $cc->depositar(5000));
        $this->assertEquals(5000, $cc->getSaldo());
    }
    public function testCuentaCorrienteExtraccion()
    {
        $cc = new \App\CuentaCorriente(123456, 'Fulano de Tal', 2000);
        $this->assertEquals("Extracción realizada", $cc->extraer(1000));
        $this->assertEquals(1000, $cc->getSaldo());
    }
    public function testCuentaCorrienteTopeExtraccion()
    {
        $cc = new \App\CuentaCorriente(123456, 'Fulano de Tal', 2000);
        $this->assertEquals("Extracción realizada", $cc->extraer(4000));
        $this->assertEquals(-2000, $cc->getSaldo());
    }
    public function testCuentaCorrienteTopeExcedido()
    {
        $cc = new \App\CuentaCorriente(123456, 'Fulano de Tal', 2000);
        $this->assertEquals("Tope de descubierto excedido", $cc->extraer(4001));
        $this->assertEquals(2000, $cc->getSaldo());
    }
    
    /** Caja Ahorro test suite */

    public function testCajaAhorroConsultarSaldo()
    {
        $ca = new \App\CajaAhorro(123456, 'Fulano de Tal', 5000);
        $this->assertEquals(5000, $ca->getSaldo());
    }
    public function testCajaAhorroDeposito()
    {
        $ca = new \App\CajaAhorro(123456, 'Fulano de Tal', 0);
        $this->assertEquals("Depósito realizado", $ca->depositar(5000));
        $this->assertEquals(5000, $ca->getSaldo());
    }
    public function testCajaAhorroExtraccion()
    {
        $ca = new \App\CajaAhorro(123456, 'Fulano de Tal', 2000);
        $this->assertEquals("Extracción realizada", $ca->extraer(1000));
        $this->assertEquals(1000, $ca->getSaldo());
    }
    public function testCajaAhorroTopeExtraccion()
    {
        $ca = new \App\CajaAhorro(123456, 'Fulano de Tal', 3000);
        $this->assertEquals("Error, tope de extracción excedido", $ca->extraer(2001));
    }
    public function testCajaAhorroFondosInsuficientes()
    {
        $ca = new \App\CajaAhorro(123456, 'Fulano de Tal', 0);
        $this->assertEquals("Error, ud. no dispone de fondos para retirar 2000", $ca->extraer(2000));
    }
    
    /** Cuenta Nueva test suite */

}