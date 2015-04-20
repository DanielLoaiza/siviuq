<?php

namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Siviuq\MainBundle\Form\ProyectosType;
use Siviuq\MainBundle\Entity\Proyectos;
use Symfony\Component\HttpFoundation\Request;

class ProyectosController extends Controller
{
	public function mostrarAction(Request $request)
	{
		$em= $this->getDoctrine()->getManager();
		$proyectos=$em->getRepository('SiviuqMainBundle:Proyectos')->findAll();
		$facultades=$em->getRepository('SiviuqMainBundle:Facultad')->findAll();
		
		$form= $this->createForm(new ProyectosType($facultades));
		$form->handleRequest($request);
		if($form->isValid())
		{
			
		}
		return $this->render("SiviuqMainBundle:Proyectos:listarProyectos.html.twig",array(
					"form"=>$form->createView(),"facultades"=>$facultades,"proyectos"=>$proyectos
		));
	}
}


