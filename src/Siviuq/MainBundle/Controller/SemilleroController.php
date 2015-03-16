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
	
}
