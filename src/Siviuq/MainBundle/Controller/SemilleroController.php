<?php

namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SemilleroController extends Controller{
	
	public function findAllAction()
	{
		$em= $this->getDoctrine()->getManager();
		
		$semilleros=$em->getRepository('SiviuqMainBundle:Semillero')->findAll();
		
		return $this->render('SiviuqMainBundle:Semilleros:listarSemilleros.html.twig', array("semilleros"=>$semilleros));
	}
	
}
