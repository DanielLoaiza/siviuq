<?php
namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Categoria;

class CategoriaController extends Controller{

	public function addAction($nombre)
	{
		$categoria=new Categoria();
		$categoria->setNombre($nombre);
		
		$em =$this->getDoctrine()->getManager();
		$em->persist($categoria);
		$em->flush();
		return new Response ('Id del nuevo producto: '.$categoria->getId().'; la categoria se a creado');
		
	}
	
	public function getAllAction()
	{
		$em = $this->getDoctrine()->getMenager();
		$categoria = $em->getRepository('SiviuqMainBundle:Categoria')->findAll();
		return $this->render('SiviuqMainBundle:Categoria:      .html.twig', array("categoria"=>$categoria));
	}
	
	public function updateAction($id, $nombre)
	{
		$em = $this->getDoctrine()->getManager();
		$categoria = $em->getRepository('SiviuqMainBundle:Categoria')->find($id);
		if(!$categoria)
		{
			throw $this->createNotFoundException('No se a encontrado la Categoria para el id' .$id);
		}
		$categoria->setNombre($nombre);
		$em->flush();
		return new Response ('Se actualizo la categoria : '.$categoria->getId());
	}
	
	public function deleteAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$categoria = $em->getRepository('SiviuqMainBundle:Categoria')->find($id);
		if(!$categoria)
		{
			throw $this->createNotFoundException('No se a encontrado la Categoria para el id' .$id);
		}
		$em->remove($categoria);
		$em->flush();
		return new Response('Categoria eliminada');
	}
}