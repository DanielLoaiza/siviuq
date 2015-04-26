<?php
namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Programa;

class ProgramaController extends Controller{

	public function addAction($nombre, $facultad_id)
	{
		$programa=new Programa();
		$programa->setNombre($nombre);
		$programa->setFacultad_id($facultad_id);
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($programa);
		$em->flush();
		return new Response ('Id del nuevo programa: '.$programa->getId().'; se a creado');
		
	}
	
	public function getAllAction()
	{
		$em = $this->getDoctrine()->getMenager();
		$programa = $em->getRepository('SiviuqMainBundle:Programa')->findAll();
		return $this->render('SiviuqMainBundle:Programa:      .html.twig', array("programa"=>$programa));
	}
	
	public function updateAction($id, $nombre, $facultad_id)
	{
		$em = $this->getDoctrine()->getManager();
		$programa = $em->getRepository('SiviuqMainBundle:Programa')->find($id);
		if(!$programa)
		{
			throw $this->createNotFoundException('No se a encontrado el programa para el id' .$id);
		}
		$programa->setNombre($nombre);
		$programa->setFacultad_id($facultad_id);
		$em->flush();
		return new Response ('Se actualizo el programa : '.$programa->getId());
	}
	
	public function deleteAction($id)
	{
	$em = $this->getDoctrine()->getManager();
		$programa = $em->getRepository('SiviuqMainBundle:Programa')->find($id);
		if(!$programa)
		{
			throw $this->createNotFoundException('No se a encontrado el programa para el id' .$id);
		}
		$em->remove($programa);
		$em->flush();
		return new Response('Programa eliminado');
	}
}
