<?php

namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DgwebBundle\Entity\Categoriaport;
use DgwebBundle\Form\CategoriaportType;

/**
 * Categoriaport controller.
 *
 * @Route("/admin/categoriaport")
 */
class CategoriaportController extends Controller
{

    /**
     * Lists all Categoriaport entities.
     *
     * @Route("/", name="admin_categoriaport")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:Categoriaport')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Categoriaport entity.
     *
     * @Route("/", name="admin_categoriaport_create")
     * @Method("POST")
     * @Template("DgwebBundle:Categoriaport:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Categoriaport();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_categoriaport_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Categoriaport entity.
     *
     * @param Categoriaport $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Categoriaport $entity)
    {
        $form = $this->createForm(new CategoriaportType(), $entity, array(
            'action' => $this->generateUrl('admin_categoriaport_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Categoriaport entity.
     *
     * @Route("/new", name="admin_categoriaport_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Categoriaport();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Categoriaport entity.
     *
     * @Route("/{id}", name="admin_categoriaport_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Categoriaport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoriaport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Categoriaport entity.
     *
     * @Route("/{id}/edit", name="admin_categoriaport_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Categoriaport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoriaport entity.');
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
    * Creates a form to edit a Categoriaport entity.
    *
    * @param Categoriaport $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Categoriaport $entity)
    {
        $form = $this->createForm(new CategoriaportType(), $entity, array(
            'action' => $this->generateUrl('admin_categoriaport_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Categoriaport entity.
     *
     * @Route("/{id}", name="admin_categoriaport_update")
     * @Method("PUT")
     * @Template("DgwebBundle:Categoriaport:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Categoriaport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoriaport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_categoriaport_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Categoriaport entity.
     *
     * @Route("/{id}", name="admin_categoriaport_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DgwebBundle:Categoriaport')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Categoriaport entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_categoriaport'));
    }

    /**
     * Creates a form to delete a Categoriaport entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_categoriaport_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
