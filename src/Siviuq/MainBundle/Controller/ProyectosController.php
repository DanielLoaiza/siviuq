<?php

namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Siviuq\MainBundle\Form\ProyectosType;

class ProyectosController extends Controller
{
	public function mostrarAction()
	{
		$em= $this->getDoctrine()->getManager();
		
		$facultades=$em->getRepository('SiviuqMainBundle:Facultad')->findAll();
		
		$form= $this->createForm(new ProyectosType($facultades));
		return $this->render("SiviuqMainBundle:Proyectos:listarProyectos.html.twig",array(
					"form"=>$form->createView(),"facultades"=>$facultades
		));
	}
}


