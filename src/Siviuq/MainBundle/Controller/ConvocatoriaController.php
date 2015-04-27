<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siviuq\MainBundle\Entity\Convocatoria;
use Siviuq\MainBundle\Form\ConvocatoriaType;

/**
 * Convocatoria controller.
 *
 */
class ConvocatoriaController extends Controller
{

    /**
     * Lists all Convocatoria entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
	
        
        $entities = $em->getRepository('SiviuqMainBundle:Convocatoria')->findAll();

        return $this->render('SiviuqMainBundle:Convocatoria:index.html.twig', array(
            'entities' => $entities,
        ));
        
        
    }
    
    public function convocatoriasInvestigadorAction()
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entities = $em->getRepository('SiviuqMainBundle:Convocatoria')->findAll();
    
    	return $this->render('SiviuqMainBundle:ConvocatoriaInvestigador:index.html.twig', array(
    			'entities' => $entities,
    	));
    }
    /**
     * Creates a new Convocatoria entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Convocatoria();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
        	$entity->upload();
            $em = $this->getDoctrine()->getManager();
            $entity->setEstado(1);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('convocatoria_show', array('id' => $entity->getId())));
        }

        return $this->render('SiviuqMainBundle:Convocatoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Convocatoria entity.
     *
     * @param Convocatoria $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Convocatoria $entity)
    {
        $form = $this->createForm(new ConvocatoriaType(), $entity, array(
            'action' => $this->generateUrl('convocatoria_create'),
            'method' => 'POST',
        ));
        $form->add('file', 'file', array(
        		'label' => 'Archivo de requisitos para la convocatoria en formado .pdf',
        		'required' => true
        ));
        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Convocatoria entity.
     *
     */
    public function newAction()
    {
        $entity = new Convocatoria();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiviuqMainBundle:Convocatoria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Convocatoria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $em1=$this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SiviuqMainBundle:Convocatoria')->find($id);
        
        $query=$em1->createQuery('SELECT p FROM SiviuqMainBundle:Proyectos p JOIN p.numeroConvocatoria c 
        		JOIN p.grupoInvestigacionId gi JOIN gi.programaId pr JOIN pr.facultadId fi JOIN p.lineaInvestigacion li
        		JOIN p.investigadorPrincipal ip WHERE c.id=:id');
        $query->setParameter('id',$id);
        $proyectos=$query->getResult();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convocatoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Convocatoria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        	'proyectos' => $proyectos,
        ));
    }

    /**
     * Displays a form to edit an existing Convocatoria entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Convocatoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convocatoria entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Convocatoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Convocatoria entity.
    *
    * @param Convocatoria $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Convocatoria $entity)
    {
        $form = $this->createForm(new ConvocatoriaType(), $entity, array(
            'action' => $this->generateUrl('convocatoria_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
        $form->add('estado');
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Convocatoria entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Convocatoria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convocatoria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('convocatoria_edit', array('id' => $id)));
        }

        return $this->render('SiviuqMainBundle:Convocatoria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Convocatoria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiviuqMainBundle:Convocatoria')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Convocatoria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('convocatoria'));
    }

    /**
     * Creates a form to delete a Convocatoria entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('convocatoria_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
