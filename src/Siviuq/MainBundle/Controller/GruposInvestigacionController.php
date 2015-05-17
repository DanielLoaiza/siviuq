<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siviuq\MainBundle\Entity\GruposInvestigacion;
use Siviuq\MainBundle\Form\GruposInvestigacionType;

/**
 * GruposInvestigacion controller.
 *
 */
class GruposInvestigacionController extends Controller
{

    /**
     * Lists all GruposInvestigacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->findAll();

        return $this->render('SiviuqMainBundle:GruposInvestigacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new GruposInvestigacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new GruposInvestigacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gruposinvestigacion_show', array('id' => $entity->getId())));
        }

        return $this->render('SiviuqMainBundle:GruposInvestigacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a GruposInvestigacion entity.
     *
     * @param GruposInvestigacion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(GruposInvestigacion $entity)
    {
        $form = $this->createForm(new GruposInvestigacionType(), $entity, array(
            'action' => $this->generateUrl('gruposinvestigacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GruposInvestigacion entity.
     *
     */
    public function newAction()
    {
        $entity = new GruposInvestigacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiviuqMainBundle:GruposInvestigacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a GruposInvestigacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GruposInvestigacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:GruposInvestigacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing GruposInvestigacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GruposInvestigacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:GruposInvestigacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a GruposInvestigacion entity.
    *
    * @param GruposInvestigacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GruposInvestigacion $entity)
    {
        $form = $this->createForm(new GruposInvestigacionType(), $entity, array(
            'action' => $this->generateUrl('gruposinvestigacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GruposInvestigacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GruposInvestigacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gruposinvestigacion_edit', array('id' => $id)));
        }

        return $this->render('SiviuqMainBundle:GruposInvestigacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a GruposInvestigacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiviuqMainBundle:GruposInvestigacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GruposInvestigacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gruposinvestigacion'));
    }

    /**
     * Creates a form to delete a GruposInvestigacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gruposinvestigacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
