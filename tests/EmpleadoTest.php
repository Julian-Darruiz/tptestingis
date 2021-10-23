<?php
class EmpleadoTest extends \PHPUnit\Framework\TestCase{

	public function crear($nom = "Julian", $ape = "Darruiz", $dni = "40843113", $salario = "50000", $sector = "No especificado") {
		$e = new \App\Empleado($nom, $ape, $dni, $salario, $sector);
		return $e;
	}

	public function testFuncionaMetodoNombreYApellido()
	{
		$r = $this-> crear("Julian","Darruiz");
		$this->assertEquals("Julian Darruiz", $r->getNombreApellido());
	}

	public function testFuncionaMetodoDni()
	{
		$r = $this-> crear("40843113");
		$this->assertEquals("40843113", $r->getDni());
	}

	public function testFuncionaMetodoSalario()
	{
		$r = $this-> crear("50000");
		$this->assertEquals("50000", $r->getSalario());
	} 

	public function testFuncionaMetodoSector()
	{
		$r = $this->crear();
		$r->setSector("Sector produccion");
		$this->assertEquals("Sector produccion", $r->getSector());
	}

	public function testFuncionaMetodoToString()
	{
		$r = $this->crear("Julian","Darruiz","40843113","50000");
		$this->assertEquals("Julian Darruiz 40843113 50000",$r);
	}

	public function testEmpleadoNombreVacio()
	{
		$this->expectException(\Exception::class);
		$this->crear("");
	}

	public function testEmpleadoApellidoVacio()
	{
		$this->expectException(\Exception::class);
		$this->crear("Julian","");
	}

	public function testEmpleadoDniVacio()
	{
		$this->expectException(\Exception::class);
		$this->crear("Julian","Darruiz","");
	}

	public function testEmpleadoSalarioVacio()
	{
		$this->expectException(\Exception::class);
		$this->crear("Julian","Darruiz", "40843113","");
	}

	public function testDniConLetrasOValoresNoNumericos()
	{
		$this->expectException(\Exception::class);
		$this->crear("Julian","Darruiz","cuatroceroochoetc");
	}

	public function testNoSeIdentificaSector()
	{
		$r = $this->crear("No especificado");
		$this->assertEquals("No especificado", $r->getSector());
	}
}	
	