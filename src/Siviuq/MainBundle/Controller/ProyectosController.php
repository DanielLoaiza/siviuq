<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Proyectos;
use Siviuq\MainBundle\Form\ProyectosType;
use Siviuq\MainBundle\Form\ProyectosType2;
use Siviuq\MainBundle\Entity\Investigador;
use Siviuq\MainBundle\Entity\Avance;
use Siviuq\MainBundle\Entity\GruposInvestigacion;
use Siviuq\MainBundle\Entity\LineasInvestigacion;
use Siviuq\MainBundle\Entity\Convocatoria;

/**
 * Proyectos controller.
 *
 */
class ProyectosController extends Controller
{

    /**
     * Lists all Proyectos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p JOIN p.grupoInvestigacionId gi JOIN gi.programaId pr JOIN pr.facultadId f where p.estado=:estado');
        $query->setParameter('estado','EJECUCION');
        $entities=$query->getResult();
        $facultades=$em->getRepository('SiviuqMainBundle:Facultad')->findAll();

        return $this->render('SiviuqMainBundle:Proyectos:index.html.twig', array(
            'entities' => $entities,'facultades'=>$facultades,
        ));
    }
    
    public function verProyectosInvestigadorAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$query = $em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p JOIN p.grupoInvestigacionId gi JOIN gi.programaId pr JOIN pr.facultadId f where p.estado=:estado');
    	$query->setParameter('estado','EJECUCION');
    	$entities=$query->getResult();
    	$facultades=$em->getRepository('SiviuqMainBundle:Facultad')->findAll();
    	
    	return $this->render('SiviuqMainBundle:ProyectoInvestigador:show.html.twig', array(
    			'entities' => $entities,'facultades'=>$facultades,
    	));
    }
    
    public function busquedaAvanzadaProyectosAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	 
    	$gruposInvestigacion=$em->getRepository('SiviuqMainBundle:GruposInvestigacion')->findAll();
    	$lineas=$em->getRepository('SiviuqMainBundle:LineasInvestigacion')->findAll();
    	$convocatorias=$em->getRepository('SiviuqMainBundle:Convocatoria')->findAll();
    	
    	
    	
    	 
    	return $this->render('SiviuqMainBundle:Proyectos:busqueda.html.twig', array(
    			'gruposInvestigacion' => $gruposInvestigacion,'lineas'=>$lineas,
    			'convocatorias'=>$convocatorias
    	));
    }
    
    public function buscarFiltrosAction(Request $request)
    {
    		$em = $this->getDoctrine()->getManager();
    			
    		$query=$em->createQueryBuilder();
    		$query->addSelect('p');
    		$query->from('SiviuqMainBundle:Proyectos','p');
    			
    			
    		if (null != $request->request->get('check_titulo')) {
    			
    			if (null != $request->request->get('titulo')) {
    				
    				$query->andwhere( $query->expr()->like('LOWER(p.titulo)',':titulo'));
    				$query->setParameter('titulo','%'.strtolower($request->request->get('titulo')).'%' );
    			}
    		}
    		
    		if (null != $request->request->get('check_investigadorPrincipal')) {
    			 
    			if (null != $request->request->get('investigadorPrincipal')) {
    				
    				$query->innerJoin('p.investigadorPrincipal', 'ip');
    				$query->andwhere( $query->expr()->like('LOWER(ip.nombre)'
    						,':nombreIp'));
    				$query->setParameter('nombreIp','%'.strtolower($request->request
    						->get('investigadorPrincipal')).'%' );
    			}
    		}
    		
    		if (null != $request->request->get('check_coInvestigador')) {
    			 
    			if (null != $request->request->get('coInvestigador')) {
    		
    				$query->innerJoin('p.investigadores', 'inv');
    				$query->andwhere( $query->expr()->like('LOWER(inv.nombre)'
    						,':nombreInv'));
    				$query->setParameter('nombreInv','%'.strtolower($request->request
    						->get('coInvestigador')).'%' );
    			}
    		}
    		
    		if (null != $request->request->get('check_grupoInvestigacion')) {
    			 
    			if (null != $request->request->get('select_grupo')) {
    		
    				$query->innerJoin('p.grupoInvestigacionId', 'gi');
    				$query->andwhere('gi.id = :gid');
    				$query->setParameter('gid', $request->request->get('select_grupo'));
    			}
    		}
    		
    		if (null != $request->request->get('check_FechaInicio')) {
    			 
    			if (null != $request->request->get('fechaInicio')) {
    		
    				$query->andwhere('p.fechaInicio = :fechaInicio');
    				$query->setParameter('fechaInicio', $request->request->get('fechaInicio'));
    			}
    		}
    		
    		if (null != $request->request->get('check_fechaFin')) {
    			 
    			if (null != $request->request->get('fechaFin')) {
    		
    				$query->andwhere('p.fechaFin = :fechaFin');
    				$query->setParameter('fechaFin', $request->request->get('fechaFin'));
    			}
    		}
    		
    		if (null != $request->request->get('check_estadoProyecto')) {
    			 
    			if (null != $request->request->get('select_estadoProyecto')) {
    		
    				$query->andwhere( 'LOWER(p.estado)=:estadopr');
    				$query->setParameter('estadopr',strtolower($request->request
    						->get('select_estadoProyecto')) );
    			}
    		}
    		
    		if (null != $request->request->get('check_estadoInforme')) {
    			 
    			if (null != $request->request->get('select_estadoInforme')) {
    		
    				$query->andwhere( 'LOWER(p.estadoInforme)=:estadoInforme');
    				$query->setParameter('estadoInforme',strtolower($request->request
    						->get('select_estadoInforme')) );
    				}
    		}
    		
    		if (null != $request->request->get('check_lineaInvestigacion')) {
    			 
    			if (null != $request->request->get('select_linea')) {
    		
    				$query->innerJoin('p.lineaInvestigacion', 'li');
    				$query->andwhere('li.id = :lid');
    				$query->setParameter('lid', $request->request->get('select_linea'));
    			}
    		}
    		
    		if (null != $request->request->get('check_convocatoria')) {
    			 
    			if (null != $request->request->get('select_convocatoria')) {
    		
    				$query->innerJoin('p.numeroConvocatoria', 'nc');
    				$query->where('nc.id = :nid');
    				$query->setParameter('nid', $request->request->get('select_convocatoria'));
    			}
    		}
    		
    		$query = $query->getQuery();
    		$entities= $query->getResult();
    		
    		
    		return $this->render('SiviuqMainBundle:Proyectos:filtrosBusqueda.html.twig', array(
    				'entities'=>$entities
    		));
    		
    }
    
    public function subirAvanceAction(Request $request,$id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('SiviuqMainBundle:Proyectos')->find($id);
    	
    	$data = $request->files->get('myfile');
    	$data2= $request->files->get('finalFile');
    	
    	$avance= new Avance();
    	$avance->setProyecto($entity);
    	
    	if ($data){
    	
	    	$avance->setFile($data);
	    	$avance->upload();
	    	$entity->setEstadoInforme('Entregado');
	    	$em->persist($avance);
	    	$em->flush();
    	}
    	else {
	    	$avance->setFile($data2);
	    	$avance->upload();
	    	$entity->setEstadoInforme('Entregado');
	    	$entity->setEstado('Terminado');
	    	$entity->setAvanceFinal($avance);
	    	$em->persist($avance);
	    	$em->flush();
    	}
    	
    	return $this->redirect($this->generateUrl('proyectos_investigador'));
    }
    
    public function actualizarProyectoFacultadAction(Request $request)
    {
    	$data = $request->request->get('facultadId');
    	$em= $this->getDoctrine()->getEntityManager();
    	$query=$em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p JOIN p.grupoInvestigacionId gi JOIN gi.programaId pr JOIN pr.facultadId f where f.id=:idFacultad AND p.estado=:estado');
    	$query->setParameter('idFacultad', $data);
    	$query->setParameter('estado','EJECUCION');
    	$proyectos=$query->getResult();
    
    
    	$html='<table class="records_list">
		<tr>
			<th>Id</th>
	    	<th>Numero</th>
	    	<th>Titulo</th>
			<th>Gasto Efectivo</th>
		    <th>Duracion</th>
		    <th>Fecha Inicio</th>
		    <th>Fecha Fin</th>
		    <th>Horas Investigador Principal</th>
		    <th>Horas Coinvestigadores</th>
		    <th>Estado Informe</th>
		    <th>Acciones</th>
		</tr>';
    	foreach ($proyectos as $resultado){
    		$html.='<tr>';
    		
    		$html.='<td>';
    		$html.=$resultado->getId();
    		$html.='</td>';
    		
    		$html.='<td>';
    		$html.=$resultado->getNumeroProyecto();
    		$html.='</td>';
    		
    		$html.='
			<td>'.$resultado->getTitulo().'</td>';
    			
    		$html.='<td>';
    		$html.=$resultado->getGastoEfectivo();
    		$html.='</td>';
    			
    		$html.='<td>';
    		$html.=$resultado->getDuracion();
    		$html.='</td>';
    		
    		
    		$html.='<td>';
    		$html.=$resultado->getFechaInicio()->format('Y-m-d');
    		$html.='</td>';
    			
    		$html.='<td>';
    		$html.=$resultado->getFechaFin()->format('Y-m-d');
    		$html.='</td>';
    			
    		$html.='<td>';
    		$html.=$resultado->getHorasInvestigadorPrincipal();
    		$html.='</td>';
    		
    		$html.='<td>';
    		$html.=$resultado->getHorasCoinvestigadores();
    		$html.='</td>';
    		
    		$html.='<td>';
    		$html.=$resultado->getEstadoInforme();
    		$html.='</td>';
    		
    		$html.='<td>';
    		
    		$html.='<a href="/siviuq/web/app_dev.php/proyectos/'.$resultado->getId().'/show"><img src="/siviuq/web/img/show.png" title="Mostrar"</img></a>';
    		$html.='<a href="/siviuq/web/app_dev.php/proyectos/'.$resultado->getId().'/edit"><img src="/siviuq/web/img/edit.png" title="Editar"</img></a>';
    		$html.='<a href="/siviuq/web/app_dev.php/proyectos/'.$resultado->getId().'/certificado"><img src="/siviuq/web/img/certificate.png" title="Certificado"</img></a>';
    		
    		
      		$html.='</td>';
    	}
    	$html.='</tr>';
    	$html.='</table>';
    	return new Response($html);
    
    }
    
    /**
     * Creates a new Proyectos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Proyectos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proyectos_show', array('id' => $entity->getId())));
        }

        return $this->render('SiviuqMainBundle:Proyectos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Proyectos entity.
     *
     * @param Proyectos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Proyectos $entity)
    {
        $form = $this->createForm(new ProyectosType(), $entity, array(
            'action' => $this->generateUrl('proyectos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    
    private function createProyectoForm(Proyectos $entity,$id)
    {
    	$form=$this->createForm(new ProyectosType2(),$entity,array(
    			'action'=>$this->generateUrl('proyectos_aplicar',array('id' => $id)),
    			'method'=>'POST',
    			
    	));
    	
    	$form->add('submit','submit',array ('label'=>'Aplicar'));
    	
				return $form;
    }
    
    public function newProyectoAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$entity = new Proyectos();
    	$convocatoria=$em->getRepository('SiviuqMainBundle:Convocatoria')->find($id);
    	$entity->setNumeroConvocatoria($convocatoria);
    	$form   = $this->createProyectoForm($entity,$id);
    	
    	return $this->render('SiviuqMainBundle:ProyectoInvestigador:new.html.twig', array(
    			'entity' => $entity,
    			'convocatoria'=>$convocatoria,
    			'form'   => $form->createView(),
    			
    	));
    }
    
    /**
     * Creates a new Proyectos entity.
     *
     */
    public function createProyectoAction(Request $request,$id)
    {
    	$entity = new Proyectos();
    	$form = $this->createProyectoForm($entity,$id);
    	$form->handleRequest($request);
    	
    	if ($form->isValid()) {
    		$entity->upload();
    		$entity->upload2();
    		$em = $this->getDoctrine()->getManager();
    		$convocatoria=$em->getRepository('SiviuqMainBundle:Convocatoria')->find($id);
    		$entity->setNumeroConvocatoria($convocatoria);
    		$entity->setEstado('Revision');
    		$em->persist($entity);
    		$em->flush();
    		
    		
    		
    		$query=$em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p INNER JOIN 
    				p.investigadorPrincipal i WHERE p.id=:pid');
    		$query->setParameter('pid',$entity->getId());
    		$proyecto=$query->getResult();
    		
    		$mailer = $this->get('mailer');
    		$message = $mailer->createMessage()
    		->setSubject('Tu Proyecto se ha inscrito exitosamente!')
    		->setFrom(array('viceinvestigaciones@uniquindio.edu.co'=>'Vicerectoria Investigaciones Uniquindio'))
    		->setTo($proyecto[0]->getInvestigadorPrincipal()->getCorreo())
    		->setBody(
    				'Te has registrado exitosamente en la convocatoria '.$convocatoria->getNombre().' proximamente daremos información'
    		);
    		$mailer->send($message);
    
    		return $this->redirect($this->generateUrl('proyectos_show', array('id' => $entity->getId())));
    	}
    
    	return $this->render('SiviuqMainBundle:Proyectos:new.html.twig', array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
    public function proyectoAprobadoAction($id)
    {
    	$entity = $this->getDoctrine()->getManager()->getRepository('SiviuqMainBundle:Proyectos')->find($id);
    	$em = $this->getDoctrine()->getEntityManager();
    	$query=$em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p INNER JOIN
    				p.investigadorPrincipal i WHERE p.id=:pid');
    	$query->setParameter('pid',$id);
    	$result=$query->getResult();
    	
    	$mailer = $this->get('mailer');
    	$message = $mailer->createMessage()
    	->setSubject('Felicidades tu proyecto ha sido aceptado')
    	->setFrom(array('viceinvestigaciones@uniquindio.edu.co'=>'Vicerectoria Investigaciones Uniquindio'))
    	->setTo($result[0]->getInvestigadorPrincipal()->getCorreo())
    	->setBody(
    			 $this->renderView(
          
                'SiviuqMainBundle:Mensajes:aprobado.txt.twig'
            ),
            'text/plain'
    	);
    	$mailer->send($message);
    	
    	 $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Proyectos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    
    public function proyectoNoAprobadoAction($id)
    {
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$query=$em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p INNER JOIN
    				p.investigadorPrincipal i WHERE p.id=:pid');
    	$query->setParameter('pid',$id);
    	$result=$query->getResult();
    	 
    	$mailer = $this->get('mailer');
    	$message = $mailer->createMessage()
    	->setSubject('Información aplicacion convocatoria')
    	->setFrom(array('viceinvestigaciones@uniquindio.edu.co'=>'Vicerectoria Investigaciones Uniquindio'))
    	->setTo($result[0]->getInvestigadorPrincipal()->getCorreo())
    	->setBody(
    			$this->renderView(
    
    					'SiviuqMainBundle:Mensajes:desaprobado.txt.twig'
    			),
    			'text/plain'
    	);
    	$mailer->send($message);
    	 
    	
    	$em = $this->getDoctrine()->getManager();
    	
    	
    	$entities = $em->getRepository('SiviuqMainBundle:Convocatoria')->findAll();
    	
    	return $this->render('SiviuqMainBundle:Convocatoria:index.html.twig', array(
    			'entities' => $entities,
    	));
    }
    


    /**
     * Displays a form to create a new Proyectos entity.
     *
     */
    public function newAction()
    {
        $entity = new Proyectos();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiviuqMainBundle:Proyectos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Proyectos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Proyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyectos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Proyectos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function downloadAction($filename)
    {
    
    	$path = $this->get('kernel')->getRootDir(). "/../web/bundles/siviuqmain/uploads/";
    	$content = file_get_contents($path.$filename);
    
    	$response = new Response();
    
    	//set headers
    	$response->headers->set('Content-Type', 'mime/type');
    	$response->headers->set('Content-Disposition', 'attachment;filename="'.$filename);
    
    	$response->setContent($content);
    	return $response;
    }

    /**
     * Displays a form to edit an existing Proyectos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Proyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyectos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Proyectos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Proyectos entity.
    *
    * @param Proyectos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Proyectos $entity)
    {
        $form = $this->createForm(new ProyectosType(), $entity, array(
            'action' => $this->generateUrl('proyectos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Proyectos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Proyectos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyectos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('proyectos_edit', array('id' => $id)));
        }

        return $this->render('SiviuqMainBundle:Proyectos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Proyectos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiviuqMainBundle:Proyectos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Proyectos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proyectos'));
    }
    
    
    public function generarCertificadoAction($id)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$query=$em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p INNER JOIN
    				p.investigadorPrincipal i WHERE p.id=:pid');
    	$query->setParameter('pid',$id);
    	$result=$query->getResult();
    	
    	$meses = date_diff($result[0]->getFechaInicio(), $result[0]->getFechaFin());
    	
    	
    	$html = $this->renderView('SiviuqMainBundle:Certificado:certificado.html.twig', array(
    			'proyecto' => $result[0],'investigador'=>$result[0]->getInvestigadorPrincipal(),'meses'=>$meses->format('%m meses')
    	));
    	
    	return new Response(
    			$this->get('knp_snappy.pdf')->getOutputFromHtml($html),
    			200,
    			array(
    					'Content-Type'        => 'application/pdf',
    					'Content-Disposition' => 'attachment; filename="certificado"'.$result[0]->getTitulo().'.pdf'
    			)
    	);
    }

    /**
     * Creates a form to delete a Proyectos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyectos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
