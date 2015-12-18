<?php

namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DgwebBundle\Entity\Fotoportafolio;
use DgwebBundle\Form\FotoportafolioType;

/**
 * Fotoportafolio controller.
 *
 * @Route("/admin/fotoportafolio")
 */
class FotoportafolioController extends Controller
{

    /**
     * Lists all Fotoportafolio entities.
     *
     * @Route("/", name="admin_fotoportafolio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:Fotoportafolio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Fotoportafolio entity.
     *
     * @Route("/", name="admin_fotoportafolio_create")
     * @Method("POST")
     * @Template("DgwebBundle:Fotoportafolio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Fotoportafolio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_fotoportafolio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Fotoportafolio entity.
     *
     * @param Fotoportafolio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fotoportafolio $entity)
    {
        $form = $this->createForm(new FotoportafolioType(), $entity, array(
            'action' => $this->generateUrl('admin_fotoportafolio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Fotoportafolio entity.
     *
     * @Route("/new", name="admin_fotoportafolio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fotoportafolio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Fotoportafolio entity.
     *
     * @Route("/{id}", name="admin_fotoportafolio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Fotoportafolio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fotoportafolio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Fotoportafolio entity.
     *
     * @Route("/{id}/edit", name="admin_fotoportafolio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Fotoportafolio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fotoportafolio entity.');
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
    * Creates a form to edit a Fotoportafolio entity.
    *
    * @param Fotoportafolio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fotoportafolio $entity)
    {
        $form = $this->createForm(new FotoportafolioType(), $entity, array(
            'action' => $this->generateUrl('admin_fotoportafolio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Fotoportafolio entity.
     *
     * @Route("/{id}", name="admin_fotoportafolio_update")
     * @Method("PUT")
     * @Template("DgwebBundle:Fotoportafolio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Fotoportafolio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fotoportafolio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_fotoportafolio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Fotoportafolio entity.
     *
     * @Route("/{id}", name="admin_fotoportafolio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DgwebBundle:Fotoportafolio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fotoportafolio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_fotoportafolio'));
    }

    /**
     * Creates a form to delete a Fotoportafolio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_fotoportafolio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
