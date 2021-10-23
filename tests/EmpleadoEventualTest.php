<?php
require_once "EmpleadoTest.php";
class EmpleadoEventualTest extends EmpleadoTest
{
	public function crear($nombre="Julian",$apellido="Darruiz",$dni="40843113",$salario="50000",$array = array(15, 30, 60,90))
	{
		$r = new \App\EmpleadoEventual($nombre,$apellido,$dni,$salario,$array);
		return $r;
	}

	public function testFuncionaMetodoCalcularComision()
    {
        $r = $this->crear();
        $this->assertEquals(2.4375, $r->calcularComision());
    }

    public function testFuncionaMetodoCalcularIngresoTotal()
    {
        $r = $this->crear();
        $this->assertEquals(50002.4375, $r->calcularIngresoTotal());
    }

    public function testMontoDeVentaNegativoOCero()
    {
        $this->expectException(\Exception::class);
        $r = $this->crear("Julian", "Tenaglia", 40365240, 1000, $array = array(15, 30, 60,-90));
    }

}