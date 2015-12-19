<?php

namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DgwebBundle\Entity\ImagenProyecto;
use DgwebBundle\Form\ImagenProyectoType;

/**
 * ImagenProyecto controller.
 *
 * @Route("/admin/imagenproyecto")
 */
class ImagenProyectoController extends Controller
{

    /**
     * Lists all ImagenProyecto entities.
     *
     * @Route("/", name="admin_imagenproyecto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:ImagenProyecto')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ImagenProyecto entity.
     *
     * @Route("/", name="admin_imagenproyecto_create")
     * @Method("POST")
     * @Template("DgwebBundle:ImagenProyecto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ImagenProyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_imagenproyecto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ImagenProyecto entity.
     *
     * @param ImagenProyecto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ImagenProyecto $entity)
    {
        $form = $this->createForm(new ImagenProyectoType(), $entity, array(
            'action' => $this->generateUrl('admin_imagenproyecto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ImagenProyecto entity.
     *
     * @Route("/new", name="admin_imagenproyecto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ImagenProyecto();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ImagenProyecto entity.
     *
     * @Route("/{id}", name="admin_imagenproyecto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:ImagenProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImagenProyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ImagenProyecto entity.
     *
     * @Route("/{id}/edit", name="admin_imagenproyecto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:ImagenProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImagenProyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ImagenProyecto entity.
    *
    * @param ImagenProyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ImagenProyecto $entity)
    {
        $form = $this->createForm(new ImagenProyectoType(), $entity, array(
            'action' => $this->generateUrl('admin_imagenproyecto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ImagenProyecto entity.
     *
     * @Route("/{id}", name="admin_imagenproyecto_update")
     * @Method("PUT")
     * @Template("DgwebBundle:ImagenProyecto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:ImagenProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImagenProyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_imagenproyecto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ImagenProyecto entity.
     *
     * @Route("/{id}", name="admin_imagenproyecto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DgwebBundle:ImagenProyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ImagenProyecto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_imagenproyecto'));
    }

    /**
     * Creates a form to delete a ImagenProyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_imagenproyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
