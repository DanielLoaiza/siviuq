<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Siviuq\MainBundle\Entity\Avance;
use Siviuq\MainBundle\Form\AvanceType;

/**
 * Avance controller.
 *
 */
class AvanceController extends Controller
{

    /**
     * Lists all Avance entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiviuqMainBundle:Avance')->findAll();

        return $this->render('SiviuqMainBundle:Avance:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Avance entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Avance();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('avance_show', array('id' => $entity->getId())));
        }

        return $this->render('SiviuqMainBundle:Avance:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Avance entity.
     *
     * @param Avance $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Avance $entity)
    {
        $form = $this->createForm(new AvanceType(), $entity, array(
            'action' => $this->generateUrl('avance_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Avance entity.
     *
     */
    public function newAction()
    {
        $entity = new Avance();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiviuqMainBundle:Avance:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Avance entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Avance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avance entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Avance:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Avance entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Avance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avance entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiviuqMainBundle:Avance:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Avance entity.
    *
    * @param Avance $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Avance $entity)
    {
        $form = $this->createForm(new AvanceType(), $entity, array(
            'action' => $this->generateUrl('avance_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Avance entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiviuqMainBundle:Avance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Avance entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('avance_edit', array('id' => $id)));
        }

        return $this->render('SiviuqMainBundle:Avance:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Avance entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiviuqMainBundle:Avance')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Avance entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('avance'));
    }

    /**
     * Creates a form to delete a Avance entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('avance_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
