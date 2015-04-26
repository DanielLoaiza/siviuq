<?php
namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\ClasificacionColciencias;

class CategoriaController extends Controller
{
public function addAction($nombre)
{
	$clasificacionColciencias=new ClasificacionColciencias();
	$clasificacionColciencias->setNombre($nombre);

	$em =$this->getDoctrine()->getManager();
	$em->persist($clasificacionColciencias);
	$em->flush();
	return new Response ('Id de la nueva clasificacion: '.$clasificacionColciencias->getId().'; la clasificaion se a creado');

}

public function getAllAction()
{
	$em = $this->getDoctrine()->getMenager();
	$clasificacionColciencias = $em->getRepository('SiviuqMainBundle:ClasificacionColciencias')->findAll();
	return $this->render('SiviuqMainBundle:ClasificacionColciencias:      .html.twig', array("ClasificacionColciencias"=>$clasificacionColciencias));
}

public function updateAction($id, $nombre)
{
	$em = $this->getDoctrine()->getManager();
	$clasificacionColciencias = $em->getRepository('SiviuqMainBundle:ClasificacionColciencias')->find($id);
	if(!$clasificacionColciencias)
	{
		throw $this->createNotFoundException('No se a encontrado la Clasificacion para el id' .$id);
	}
	$clasificacionColciencias->setNombre($nombre);
	$em->flush();
	return new Response ('Se actualizo la Clasificacion : '.$clasificacionColciencias->getId());
}

public function deleteAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$clasificacionColciencias = $em->getRepository('SiviuqMainBundle:ClasificacionColciencias')->find($id);
	if(!$clasificacionColciencias)
	{
		throw $this->createNotFoundException('No se a encontrado la Clasificacion para el id' .$id);
	}
	$em->remove($clasificacionColciencias);
	$em->flush();
	return new Response('clasificacion eliminada');

}
}