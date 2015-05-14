<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swift_Attachment;
use Swift_Encoding;
use Siviuq\MainBundle\Entity\Evaluador;
use Siviuq\MainBundle\Form\EvaluadorType;
use SebastianBergmann\Environment\Console;

/**
 * Evaluador controller.
 *
 */
class EvaluadorController extends Controller
{

    /**
     * Lists all Evaluador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiviuqMainBundle:Evaluador')->findAll();

        return $this->render('SiviuqMainBundle:Evaluador:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Evaluador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Evaluador();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('evaluador_show', array('id' => $entity->getId())));
        }

        return $this->render('SiviuqMainBundle:Evaluador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    public function asignarEvaluadorAction($evaluadorId,$proyectoId)
    {
    	$em = $this->getDoctrine()->getManager();
    	$evaluador=$em->getRepository('SiviuqMainBundle:Evaluador')->find($evaluadorId);
    	$em->flush();
    	$proyecto=$em->getRepository('SiviuqMainBundle:Proyectos')->find($proyectoId);
    	$proyecto->setEvaluador($evaluador);
    	$em->flush();
    	
    	$path = $this->get('kernel')->getRootDir(). "/../web/bundles/siviuqmain/uploads/evaluacion_proyectos.xls";
    	$mailer = $this->get('mailer');
    	$message = $mailer->createMessage()
    	->setSubject('Solicitud revisión proyecto')
    	->setFrom(array('viceinvestigaciones@uniquindio.edu.co'=>'Vicerrectoria Investigaciones Uniquindio'))
    	->setTo($evaluador->getCorreo())
    	->setBody(
    			$this->renderView(
    	
    					'SiviuqMainBundle:Mensajes:solicitudpar.txt.twig',array('proyecto'=>$proyecto,'evaluador'
    							=>$evaluador)
    			),
    			'text/plain'
    	)
    	->attach(
    			Swift_Attachment::fromPath($proyecto->getAbsolutePath(),'application/pdf')->setEncoder
    			(Swift_Encoding::getBase64Encoding())
    	)
    	->attach(
    			Swift_Attachment::fromPath($proyecto->getAbsolutePath2(),
    					'application/vnd.ms-excel')
    			->setEncoder
    			(Swift_Encoding::getBase64Encoding())
    	)
    	->attach(
    			Swift_Attachment::fromPath($path,
    					'application/vnd.ms-excel')
    			->setEncoder
    			(Swift_Encoding::getBase64Encoding())
    	)
    	
    	;
    	
    	//$mailer->send($message);
    	
    	return $this->redirect($this->generateUrl('proyectos_show', array('id' => $proyecto->getId())));
    }

    /**
     * Creates a form to create a Evaluador entity.
     *
     * @param Evaluador $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Evaluador $entity)
    {
        $form = $this->createForm(new EvaluadorType(), $entity, array(
            'action' => $this->generateUrl('evaluador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Evaluador entity.
     *
     */
    public function newAction()
    {
        $entity = new Evaluador();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiviuqMainBundle:Evaluador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Evaluador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Evaluador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Evaluador:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Evaluador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Evaluador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluador entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Evaluador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Evaluador entity.
    *
    * @param Evaluador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Evaluador $entity)
    {
        $form = $this->createForm(new EvaluadorType(), $entity, array(
            'action' => $this->generateUrl('evaluador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Evaluador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Evaluador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('evaluador_edit', array('id' => $id)));
        }

        return $this->render('SiviuqMainBundle:Evaluador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Evaluador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiviuqMainBundle:Evaluador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Evaluador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('evaluador'));
    }

    /**
     * Creates a form to delete a Evaluador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evaluador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
