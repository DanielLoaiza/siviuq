<?php

namespace Siviuq\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Siviuq\MainBundle\Entity\Proyectos;
use Siviuq\MainBundle\Form\ProyectosType;

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

        return $this->render('SiviuqMainBundle:Proyectos:index.html.twig', array(
            'entities' => $entities,
        ));
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
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
