<?php

namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DgwebBundle\Entity\Fotoblog;
use DgwebBundle\Form\FotoblogType;

/**
 * Fotoblog controller.
 *
 * @Route("/admin/fotoblog")
 */
class FotoblogController extends Controller
{

    /**
     * Lists all Fotoblog entities.
     *
     * @Route("/", name="admin_fotoblog")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:Fotoblog')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Fotoblog entity.
     *
     * @Route("/", name="admin_fotoblog_create")
     * @Method("POST")
     * @Template("DgwebBundle:Fotoblog:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Fotoblog();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_fotoblog_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Fotoblog entity.
     *
     * @param Fotoblog $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fotoblog $entity)
    {
        $form = $this->createForm(new FotoblogType(), $entity, array(
            'action' => $this->generateUrl('admin_fotoblog_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Fotoblog entity.
     *
     * @Route("/new", name="admin_fotoblog_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fotoblog();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Fotoblog entity.
     *
     * @Route("/{id}", name="admin_fotoblog_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Fotoblog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fotoblog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Fotoblog entity.
     *
     * @Route("/{id}/edit", name="admin_fotoblog_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Fotoblog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fotoblog entity.');
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
    * Creates a form to edit a Fotoblog entity.
    *
    * @param Fotoblog $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fotoblog $entity)
    {
        $form = $this->createForm(new FotoblogType(), $entity, array(
            'action' => $this->generateUrl('admin_fotoblog_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Fotoblog entity.
     *
     * @Route("/{id}", name="admin_fotoblog_update")
     * @Method("PUT")
     * @Template("DgwebBundle:Fotoblog:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Fotoblog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fotoblog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_fotoblog_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Fotoblog entity.
     *
     * @Route("/{id}", name="admin_fotoblog_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DgwebBundle:Fotoblog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fotoblog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_fotoblog'));
    }

    /**
     * Creates a form to delete a Fotoblog entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_fotoblog_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
