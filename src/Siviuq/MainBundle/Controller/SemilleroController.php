<?php

namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Semillero;

class SemilleroController extends Controller{
	
	public function findAllAction()
	{
		$em= $this->getDoctrine()->getManager();
		
		$semilleros=$em->getRepository('SiviuqMainBundle:Semillero')->findAll();
		
		return $this->render('SiviuqMainBundle:Semilleros:listarSemilleros.html.twig', array("semilleros"=>$semilleros));
	}
	
	public function getByIdAction($id)
	{
		$em=$this->getDoctrine()->getManager();
		$semillero= $em->getRepository('SiviuqMainBundle:Semillero')->find($id);
		
		return $this->render('SiviuqMainBundle:Semilleros:detalleSemilleros.html.twig', array("semillero"=>$semillero));
	}
	
	public function downloadAction($filename)
	{
		
		$path = $this->get('kernel')->getRootDir(). "/../web/downloads/";
		$content = file_get_contents($path.$filename);
		
		$response = new Response();
		
		//set headers
		$response->headers->set('Content-Type', 'mime/type');
		$response->headers->set('Content-Disposition', 'attachment;filename="'.$filename);
		
		$response->setContent($content);
		return $response;
	}
	
	public function mostrarAction()
	{
		return $this->render('SiviuqMainBundle:Semilleros:download.html.twig');
	}
	
}
