<?php
namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Lineas_investigacion;

class Lineas_investigacionController extends Controller{

	public function addAction($nombre)
	{
		$lineas_investigacion=new Lineas_investigacion();
		$lineas_investigacion->setNombre($nombre);
		$em =$this->getDoctrine()->getManager();
		$em->persist($lineas_investigacion);
		$em->flush();
		return new Response ('Id de la nueva linea de investigacion: '.$lineas_investigacion->getId().';  se a creado');
		
	}
	
	public function getAllAction()
	{
		$em = $this->getDoctrine()->getMenager();
		$lineas_investigacion = $em->getRepository('SiviuqMainBundle:Lineas_investigacion')->findAll();
		return $this->render('SiviuqMainBundle:Lineas_investigacion:      .html.twig', array("lineas_investigacion"=>$lineas_investigacion));
	}
	
	public function updateAction($id, $nombre)
	{
		$em = $this->getDoctrine()->getManager();
		$lineas_investigacion = $em->getRepository('SiviuqMainBundle:Lineas_investigacion')->find($id);
		if(!$lineas_investigacion)
		{
			throw $this->createNotFoundException('No se a encontrado la linea de investigacion para el id' .$id);
		}
		$lineas_investigacion->setNombre($nombre);
		$em->flush();
		return new Response ('Se actualizo la linea de investigacion : '.$lineas_investigacion->getId());
	}
	
	public function deleteAction($id)
	{
	    $em = $this->getDoctrine()->getManager();
	  	$lineas_investigacion = $em->getRepository('SiviuqMainBundle:Lineas_investigacion')->find($id);
		if(!$lineas_investigacion)
		{
			throw $this->createNotFoundException('No se a encontrado la linea de investigacion para el id' .$id);
		}
		$em->remove($lineas_investigacion);
		$em->flush();
		return new Response('linea de invetigacion eliminada');
	}
}
