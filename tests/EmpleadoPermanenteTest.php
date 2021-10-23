<?php
require_once "EmpleadoTest.php";

class EmpleadoPermanenteTest extends \PHPUnit\Framework\TestCase
{
	public function crear($nombre="Adan",$apellido="Volken",$dni="40843113",$salario="5000",\DateTime $fechaIngreso=null)

	{
		$r = new \App\EmpleadoPermanente($nombre,$apellido,$dni,$salario,new DateTime('1997-09-15'));
		return $r;
	}

	 public function testFuncionaMetodoFechaIngreso()
    {
        $r = $this->crear();
        $this->assertEquals('97-09-15', date_format($r->getFechaIngreso(), 'y-m-d'));
    }

    public function testFuncionaMetodoCalcularComision()
    {
        $r = $this->crear();
        $this->assertEquals('24%', $r->calcularComision());
    }

    public function testFuncionaMetodoIngresoTotal()
    {
        $r = $this->crear();
        $this->assertEquals('6200', $r->calcularIngresoTotal());
    }

    public function testFuncionaMetodoCalcularAntiguedad()
    {
        $r = $this->crear();
        $this->assertEquals('24', $r->calcularAntiguedad());
    }

    public function testFechaIngresoSinProporcionar()
    {
        $r = new App\EmpleadoPermanente("Adan", "Volken", 40365240, 1000);
        $f = new \DateTime();
        $this->assertEquals(date_format($f, 'y-m-d'), date_format($r->getFechaIngreso(), 'y-m-d'));
        $this->assertEquals('0', $r->calcularAntiguedad());
    }

    public function testFechaDeIngresoPosteriorAActual()
    {
        $this->expectException(\Exception::class);
        $r = new App\EmpleadoPermanente("Adan", "Volken", 40365240, 1000, new DateTime('2025-9-15'));
    }
}
