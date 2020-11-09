<?php
abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase
{
    public function testSePuedeObtenerNombreApellido()
    {
        $e = $this->crear("Mengano", "De Tal");
        $this->assertEquals("Mengano De Tal", $e->getNombreApellido());
    }

    public function testSePuedeObtenerDNI()
    {
        $e = $this->crear();
        $this->assertEquals("99999999", $e->getDNI());
    }

    public function testSePuedeObtenerSalario()
    {
        $e = $this->crear();
        $this->assertEquals("5000", $e->getSalario());
    }

    public function testSePuedeSetearyObtenerSector()
    {
        $e = $this->crear();
        $e->setSector('Quality Assurance');
        $this->assertEquals("Quality Assurance", $e->getSector());
    }

    public function testToString()
    {
        $e = $this->crear();
        $this->assertEquals("Mengano De Tal 99999999 5000", $e->__toString());
    }

    public function testNoSePuedeConstruirSinNombreEmpleado()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear('');
    }

    public function testNoSePuedeConstruirSinApellidoEmpleado()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear('Mengano', '');
    }

    public function testNoSePuedeConstruirSinDNIEmpleado()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear('Mengano', 'De Tal', '');
    }

    public function testNoSePuedeConstruirSinSalarioEmpleado()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear('Mengano', 'De Tal', 99999999, '');
    }

    public function testDNINoPuedeContenerCaracteresEspeciales()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear('Mengano', 'De Tal', '@$%#');
    }

    public function testDNINoPuedeContenerLetras()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear('Mengano', 'De Tal', 'test');
    }

    public function testSectorNoEspecificado()
    {
        $e = $this->crear();
        $this->assertEquals("No especificado", $e->getSector());
    }
}