<?php
namespace Siviuq\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Siviuq\MainBundle\Entity\Estudiantes;
use Siviuq\MainBundle\Entity\Facultad;
use Siviuq\MainBundle\Entity\Programa;

class PruebasControllerTest extends WebTestCase
{
	public function testCrearEs()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/hello/Fabien');

		$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
	}
	
// 	##Me identifica si fue creado satisfactoriamente un estudiante 
// 	public function  testCrearEstudiante()
// 	{
// 		$estudiante =  new Estudiantes();
// 		$estudiante->setId("12345");
// 		$estudiante->setNombre("javier");
// 		$estudiante->setCorreo("javier@gmail.com");
// 		$estudiante->setDireccion("mercedes");
// 		$estudiante->setTelefono("3243234");
// 		$estudiante->setCedula("12345");
// 		$estudiante->setObservaciones("ninguna");
// 		$estudiante->setProgramaAcademico(12345);
// 		$estudiante->setSemestre(5);
// 		$estudiante->setProyectoInvestigacion(2);
// 		$estudiante->setSemilleroFormacion(4);
		
// 		$em = $this->getdDoctrine()->getManager();
// 		$em->persist($estudiante);
// 		$em->flush();
		
// 		$this->assertTrue($em->find("12345"));
		
// 	}
	
// 	## Me Comprueba la cantidad de Semilleros que estan registrados 
// 	public function  testContarSemilleros()
// 	{
	
// 		$em= $this->getDoctrine()->getManager();
		
// 		$semilleros=$em->getRepository('SiviuqMainBundle:Semillero')->findAll();
		
// 		$cantidad= Count($semilleros);
		
// 		$this->assertCount(5, $cantidad);
		
// 	}
	
// 	## Comprueba si se obtenido un programa buscado por el id 
// 	public  function testGetBiIde()
// 	{
// 		$em= $this->getDoctrine()->getManager();
// 		$programa=$em->getRepository('SiviuqMainBundle:Programa')->findOneByid(5);
// 		$this->assertEquals(5, $programa->getId());
// 	}
	
// 	##Revisa si una facultad ya se ecuentra registrada 
// 	public function testGetFacultad()
// 	{
// 		$repository= $this->getDoctrine()->getManager()->getRepository('SiviuqMainBundle:Facultad');
		
// 		$facultad=$repository->findOneByiNombre("ingeniería");
		
// 		$this->assertEquals("ingeniería", $faculdad->getNomber());
// 	}
	
// 	##ver si se registro satisfactoriamente una facultad 
// 	public function testCrearFacultaf()
// 	{
		
// 		$facultad =  new Facultad();
// 		$facultad->setId(1);
// 		$facultad->setNombre("Educacion");
		
// 		$em = $this->getdDoctrine()->getManager();
// 		$em->persist($facultad);
// 		$em->flush();
		
// 		$this->assertEquals("1", $facultad->getId());
	
// 	}
	
// 	##registro de una programa satisfacotiramente 
// 	public function testCrearPrograma()
// 	{
	
// 		$facultad =  new Facultad();
// 		$facultad->setId(1);
// 		$facultad->setNombre("Educacion");
// 		$programa = new Programa();
// 		$programa->setId(3);
// 		$programa->setNombre("Biologia");
// 		$programa->setFacultadId($facultad->getId());
	
// 		$em = $this->getdDoctrine()->getManager();
// 		$em->persist($facultad);
// 		$em->persist($programa);
// 		$em->flush();
	
// 		$this->assertEquals("biologia", $facultad->getNombre());
	
// 	}
	
// 	//revisa la lista de la calificacion de los proyectos
// 	public function testListarCalificacion()
// 	{
// 		$repository= $this->getRepository('SiviuqMainBundle:ProyectosController');
// 		$query = $repository->listarCalificacion("a");
	
// 		$this->assertEquals("a",array($query->getNombre()));
// 	}
	
// 	// Lista los estidiantes activos 
// 	public function testListarEstudiantesActivos()
// 	{
// 		$repository= $this->getRepository('SiviuqMainBundle:EstudiantesController');
// 		$query = $repository->listarEstudiantesActivos(true);
	
// 		$this->assertEquals(true,array($query->getEstado()));
// 	}
	
// 	//listar los proyectos de investigacion que han tenido un gasto efectivo de 200.000.000 o mas
// 	public function testProyectosDeInvestigacionValor()
// 	{
// 		$repository= $this->getRepository('SiviuqMainBundle:ProyectosController');
		
// 		$query = $repository->proyectosDeInvestigacionValor(200000000);
	
// 		$this->assertEquals(200000000>=array($query->getGastoEfectivo));
// 	}
	
// 	//proyectos que les queda poco tiempo 
// 	public function testProyectosAtrasados()
// 	{
// 		$repository= $this->getRepository('SiviuqMainBundle:ProyectosController');
	
// 		$query = $repository->proyectosAtrasados("2015/04/30");
	
// 		$this->assertEquals(10,array($query->getTiempo()));
// 	}
	
// 	//mostrar los grupos de investigacion que tengan una linea de investigacion dada
// 	public function testLineaDeInvstigacion()
// 	{
// 		$repository= $this->getRepository('SiviuqMainBundle:GruposInvestigacionController');
	
// 		$query = $repository->lineaDeInvstigacion();
	
// 		$this->assertTrue(null!=$query);
// 	}
	
	
// 	//listar los profesores que aun se encuentran activos en un grupo de investigacion
// 	public function testListarProfesoresActivos()
// 	{
// 		$repository= $this->getRepository('SiviuqMainBundle:ProfesoresController');
// 		$query = $repository->listarProfesoressActivos(true);
	
// 		$this->assertEquals(true,array($query->getEstado()));
// 	}
	
// 	//Revisa si el usuario a sido registrado depnendiendo el tipo de rol asignado 
// 	public function testRegistroUsuario()
// 	{
// 		$em =$this->getRepository('SiviuqMainBundle:UsuarioController');
// 		$query = $em->registrarUsuario("12345","javier","javier@gmail.com","mercedes","3243234","profesor");
// 		$em->persist($query);
// 		$em->flush();
		
// 		$this->assertEquals("12345",$query->getId());
// 	}
	
// 	//buscar patentes 
// 	public function testBuscarPatente()
// 	{
// 		$em =$this->getRepository('SiviuqMainBundle:PatenteController');
// 		$query = $em->buscarPatente("estudio relacionado con el rio Quindio");
// 		$this->assertEquals("estudio relacionado con el rio Quindio",$query->getNombre());
// 	}
	
// 	//muestra los proyectos finalizados 
// 	public function  testProyectosFinalizados()
// 	{
// 		$em =$this->getRepository('SiviuqMainBundle:UsuarioController');
// 		$query = $em->buscarPatente("terminado");
// 		$this->assertEquals("terminado",array($query->getEstado()));
// 	}
	
	

}