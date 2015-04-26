<?php

namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Siviuq\MainBundle\Form\ProyectosType;
use Siviuq\MainBundle\Entity\Proyectos;
use Symfony\Component\HttpFoundation\Request;

class ProyectosController2 extends Controller
{
	public function mostrarAction()
	{
		$em= $this->getDoctrine()->getManager();
		
		$facultades=$em->getRepository('SiviuqMainBundle:Facultad')->findAll();
		$proyectos=$em->getRepository('SiviuqMainBundle:Proyectos')->findAll();
		
		$form= $this->createForm(new ProyectosType());
		return $this->render("SiviuqMainBundle:Proyectos:listarProyectos.html.twig",array(
					"form"=>$form->createView(),"facultades"=>$facultades,"proyectos"=>$proyectos
		));
	}
	
	public function actualizarProyectoFacultadAction(Request $request)
	{	
		$em= $this->getDoctrine()->getEntityManager();
		
		$facultades=$em->getRepository('SiviuqMainBundle:Facultad')->findAll();
		$query=$em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p JOIN p.grupoInvestigacionId gi JOIN gi.programaId pr JOIN pr.facultadId f where f.id=:idFacultad');
		$query->setParameter('idFacultad', 1);
		//SELECT * FROM Proyectos p JOIN GruposInvestigacion gi ON p.grupoInvestigacionId_id = gi.id JOIN Programa pr On gi.ProgramaId_id = pr.id JOIN Facultad f ON pr.facultadid_id = f.id where f.id=?
		
		
		$proyectos=$query->getResult();
		if($request->isXmlHttpRequest())
		{
			echo "hola";
			$facultadid=$request->request->get('facultadId');
			$form= $this->createForm(new ProyectosType());
			
			return $this->render("SiviuqMainBundle:Proyectos:listarProyectos.html.twig",array(
					"form"=>$form->createView(),"facultades"=>$facultades,"proyectos"=>$proyectos
			));
		}
		
		$facultadid=$request->request->get('facultadId');
		$em= $this->getDoctrine()->getManager();
// 		$query=$em->getRepository('SiviuqMainBundle:Proyectos')->createQueryBuilder('p')
// 		->where('p.grupoInvestigacionId.programaId.facultadId.id=:facultad')->setParameter('facultad',
// 				1)->getQuery();
// 			$listaProyectos=$query->getResult();
// 		$proyectos=$em->getRepository('SiviuqMainBundle:Proyectos')->findAll();
			
// 			$html = '<table id="tabla" border="1">
// 					{% for proyecto in $listaProyectos %}
// 					<tr>
// 					<th>Titulo</th>
// 					<th>Duración(meses)</th>
// 					<th>Grupo de investigación</th>
// 					<th>Linea de investigación</th>
// 					<th>Investigador principal</th>
// 					<th>Estado del informe</th>
// 					<th>Ver Detalles</th>
// 					</tr>
// 					<tr>
// 					<td>{{ proyecto.titulo }}</td>
// 					<td>{{ proyecto.duracion }}</td>
// 					<td>{{ proyecto.grupoinvestigacionId.nombre }}</td>
// 					<td>{{ proyecto.lineaInvestigacion.nombre }}</td>
// 					<td>{{ proyecto.investigadorPrincipal.nombre }}</td>
// 					<td>{{ proyecto.estadoInforme }}</td>
// 					<td><img src="{{
// 					     asset('+'img/verDetalle.png'+') 
// 					  }}" alt="detalle" /> </td>
// 					</tr>
// 					{% endfor %}
// 					</table>';
			
// 		return $html;
		return $this->render("SiviuqMainBundle:Proyectos:listarProyectos.html.twig",array(
				"form"=>$form->createView(),"facultades"=>$facultades,"proyectos"=>$proyectos
		));
	}
}


