<?php
namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\GruposInvestigacion;

class GruposInvestigacionController extends Controller{

	public function addAction($codigo, $nombre, $fecha_conformacion, $programald_id, $clasicacionColciencias_id)
	{
		$gruposInvestigacion=new GruposInvestigacion();
		$gruposInvestigacion->setCodigo($codigo);
		$gruposInvestigacion->setNombre($nombre);
		$gruposInvestigacion->setFecha_conformacion($fecha_conformacion);
		$gruposInvestigacion->setProgramald_id($programald_id);
		$gruposInvestigacion->setClasicacionColciencias_id($clasicacionColciencias_id);
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($gruposInvestigacion);
		$em->flush();
		return new Response ('Id del nuevo nuevo grupo de investigacion: '.$gruposInvestigacion->getId().'; se a creado');
		
	}
	
	public function getAllAction()
	{
		$em = $this->getDoctrine()->getMenager();
		$gruposInvestigacion = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->findAll();
		return $this->render('SiviuqMainBundle:GruposInvestigacion:      .html.twig', array("gruposInvestigacion"=>$gruposInvestigacion));
	}
	
	public function updateAction($id, $codigo, $nombre, $fecha_conformacion, $programald_id, $clasicacionColciencias_id)
	{
		$em = $this->getDoctrine()->getManager();
		$gruposInvestigacion = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->find($id);
		if(!$gruposInvestigacion)
		{
			throw $this->createNotFoundException('No se a encontrado el grupo para el id' .$id);
		}
		$gruposInvestigacion->setCodigo($codigo);
		$gruposInvestigacion->setNombre($nombre);
		$gruposInvestigacion->setFecha_conformacion($fecha_conformacion);
		$gruposInvestigacion->setProgramald_id($programald_id);
		$gruposInvestigacion->setClasicacionColciencias_id($clasicacionColciencias_id);
		
		$em->flush();
		return new Response ('Se actualizo la categoria : '.$categoria->getId());
	}
	
	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$gruposInvestigacion = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->find($id);
		if(!$gruposInvestigacion)
		{
			throw $this->createNotFoundException('No se a encontrado el grupo para el id' .$id);
		}
		$em->remove($gruposInvestigacion);
		$em->flush();
		return new Response('Categoria eliminada');
	}
}