<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siviuq\MainBundle\Entity\Investigador;
use Siviuq\MainBundle\Form\InvestigadorType;

/**
 * Investigador controller.
 *
 */
class InvestigadorController extends Controller
{

    /**
     * Lists all Investigador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiviuqMainBundle:Investigador')->findAll();

        return $this->render('SiviuqMainBundle:Investigador:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Investigador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Investigador();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('investigador_show', array('id' => $entity->getId())));
        }

        return $this->render('SiviuqMainBundle:Investigador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Investigador entity.
     *
     * @param Investigador $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Investigador $entity)
    {
        $form = $this->createForm(new InvestigadorType(), $entity, array(
            'action' => $this->generateUrl('investigador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Investigador entity.
     *
     */
    public function newAction()
    {
        $entity = new Investigador();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiviuqMainBundle:Investigador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Investigador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Investigador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Investigador:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Investigador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Investigador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigador entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Investigador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Investigador entity.
    *
    * @param Investigador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Investigador $entity)
    {
        $form = $this->createForm(new InvestigadorType(), $entity, array(
            'action' => $this->generateUrl('investigador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Investigador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Investigador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Investigador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('investigador_edit', array('id' => $id)));
        }

        return $this->render('SiviuqMainBundle:Investigador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Investigador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiviuqMainBundle:Investigador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Investigador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('investigador'));
    }

    /**
     * Creates a form to delete a Investigador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('investigador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar'))
            ->getForm()
        ;
    }
}
