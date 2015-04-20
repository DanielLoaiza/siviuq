<?php
namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Facultad;

class FacultadController extends Controller{

	public function addAction($nombre)
	{
		$facultad=new Facultad();
		$facultad->setNombre($nombre);
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($facultad);
		$em->flush();
		return new Response ('Id de la nueva facultad: '.$facultad->getId().'; la falcultad se a creado');
		
	}
	
	public function getAllAction()
	{
		$em = $this->getDoctrine()->getMenager();
		$facultad = $em->getRepository('SiviuqMainBundle:Facultad')->findAll();
		return $this->render('SiviuqMainBundle:Facultad:      .html.twig', array("facultad"=>$facultad));
	}
	
	public function updateAction($id, $nombre)
	{
		$em = $this->getDoctrine()->getManager();
		$facultad= $em->getRepository('SiviuqMainBundle:Facultad')->find($id);
		if(!$facultad)
		{
			throw $this->createNotFoundException('No se a encontrado la facultad para el id' .$id);
		}
		$facultad->setNombre($nombre);
		$em->flush();
		return new Response ('Se actualizo la facultad : '.$facultad->getId());
	}
	
	public function deleteAction($id)
	{
	    $em = $this->getDoctrine()->getManager();
		$facultad= $em->getRepository('SiviuqMainBundle:Facultad')->find($id);
		if(!$facultad)
		{
			throw $this->createNotFoundException('No se a encontrado la facultad para el id' .$id);
		}
		$em->remove($facultad);
		$em->flush();
		return new Response('facultad eliminada');
	}
}