<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Proyectos;

class ProyectosController extends Controller {
	
	public function getByFacultad($facultad)
	 {
		$repository = $this->getDoctrine()->getRepository('SiviuqMainBundle:Proyectos');
		$proyectos= $repository->findOneBy(array("facultad"=>$facultad));
		return $proyectos;
	 }
	
	 public function getByFacultad($programa)
	 {
	 	$repository = $this->getDoctrine()->getRepository('SiviuqMainBundle:Proyectos');
	 	$proyectos= $repository->findOneBy(array("programa"=>$programa));
	 	return $proyectos;
	 }
	 
}
