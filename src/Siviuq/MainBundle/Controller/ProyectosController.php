<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Proyectos;
use Siviuq\MainBundle\Form\ProyectosType;
use Siviuq\MainBundle\Form\ProyectosType2;

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

        $entities = $em->getRepository('SiviuqMainBundle:Proyectos')->findAll();
        $facultades=$em->getRepository('SiviuqMainBundle:Facultad')->findAll();

        return $this->render('SiviuqMainBundle:Proyectos:index.html.twig', array(
            'entities' => $entities,'facultades'=>$facultades,
        ));
    }
    
    public function actualizarProyectoFacultadAction(Request $request)
    {
    	$data = $request->request->get('facultadId');
    	$em= $this->getDoctrine()->getEntityManager();
    	$query=$em->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p JOIN p.grupoInvestigacionId gi JOIN gi.programaId pr JOIN pr.facultadId f where f.id=:idFacultad');
    	$query->setParameter('idFacultad', $data);
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
    		$em->persist($entity);
    		$em->flush();
    		
    		$mailer = $this->get('mailer');
    		$message = $mailer->createMessage()
    		->setSubject('You have Completed Registration!')
    		->setFrom('viceInvestigaciones@noReply')
    		->setTo('danielfloaiza@gmail.com')
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
