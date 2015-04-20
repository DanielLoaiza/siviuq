<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Estudiante;

class EstudianteController extends Controller {
	
	public function addAction($nombre, $correo, $direccion, $telefono, $tipo, $cedula, $observaciones, $semestre, $programaAcdemico_id, $semilleroFormacion_id) {
		$estudiante = new Estudiante ();
		$estudiante->setNombre ( $nombre );
		$estudiante->setCorreo( $correo );
		$estudiante->setDireccion ( $direccion );
		$estudiante->setTelefono ( $telefono );
		$estudiante->setTipo ( $tipo );
		$estudiante->setCedula ( $cedula );
		$estudiante->setObervaciones ( $observaciones );
		$estudiante->setSemestre ( $semestre );
		$estudiante->setProgramaAcdemico_id ( $programaAcdemico_id );
		$estudiante->setSemilleroFormacion_id ( $semilleroFormacion_id );
		$em = $this->getDoctrine ()->getManager ();
		$em->persist ( $estudiante );
		$em->flush ();
		return new Response ( 'Id del nuevo estudiante: ' . $categoria->getCedula () . '; se a creado' );
	}
	
	public function getAllAction() {
		$em = $this->getDoctrine ()->getMenager ();
		$estudiante = $em->getRepository ( 'SiviuqMainBundle:Estudiante' )->findAll ();
		return $this->render ( 'SiviuqMainBundle:Estudiante:      .html.twig', array (
				"estudiante" => $estudiante 
		) );
	}
	
	public function updateAction($id, $nombre, $correo, $direccion, $telefono, $tipo, $cedula, $observaciones, $semestre, $programaAcdemico_id, $semilleroFormacion_id) {
		$em = $this->getDoctrine ()->getManager ();
		$estudinate = $em->getRepository ( 'SiviuqMainBundle:Estudiante' )->find ( $id );
		if (! $estudinate) {
			throw $this->createNotFoundException ( 'No se a encontrado el estudiante para el id' . $id );
		}
		$estudinate->setNombre ( $nombre );
		$estudiante->setCorreo( $correo );
		$estudiante->setDireccion ( $direccion );
		$estudiante->setTelefono ( $telefono );
		$estudiante->setTipo ( $tipo );
		$estudiante->setCedula ( $cedula );
		$estudiante->setObervaciones ( $observaciones );
		$estudiante->setSemestre ( $semestre );
		$estudiante->setProgramaAcdemico_id ( $programaAcdemico_id );
		$estudiante->setSemilleroFormacion_id ( $semilleroFormacion_id );
		$em->flush ();
		return new Response ( 'Se actualizo el estudiante : ' . $estudinate->getId () );
	}
	
	public function deleteAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		$estudiante = $em->getRepository ( 'SiviuqMainBundle:Estudiante' )->find ( $id );
		if (! $estudiante) {
			throw $this->createNotFoundException ( 'No se a encontrado el estudiante para el id' . $id );
		}
		$em->remove ( $estudiante );
		$em->flush ();
		return new Response ( 'Estudiante eliminado' );
	}
}