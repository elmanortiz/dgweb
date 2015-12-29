<?php
  
namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DgwebBundle\Entity\Categoriablog;
use DgwebBundle\Form\CategoriablogType;

/**
 * Categoriablog controller.
 *
 * @Route("/admin/categoriablog")
 */
class CategoriablogController extends Controller
{

    /**
     * Lists all Categoriablog entities.
     *
     * @Route("/", name="admin_categoriablog")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:Categoriablog')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Categoriablog entity.
     *
     * @Route("/", name="admin_categoriablog_create")
     * @Method("POST")
     * @Template("DgwebBundle:Categoriablog:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Categoriablog();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_categoriablog_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Categoriablog entity.
     *
     * @param Categoriablog $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Categoriablog $entity)
    {
        $form = $this->createForm(new CategoriablogType(), $entity, array(
            'action' => $this->generateUrl('admin_categoriablog_create'),
            'method' => 'POST',
        ));

        $form->add('submit','submit', array('label' => 'Guardar',
                                               'attr'=>
                                                        array('class'=>'botonpanel btn-success ')));

        return $form;
    }

    /**
     * Displays a form to create a new Categoriablog entity.
     *
     * @Route("/new", name="admin_categoriablog_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Categoriablog();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Categoriablog entity.
     *
     * @Route("/{id}", name="admin_categoriablog_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Categoriablog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoriablog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Categoriablog entity.
     *
     * @Route("/{id}/edit", name="admin_categoriablog_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Categoriablog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoriablog entity.');
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
    * Creates a form to edit a Categoriablog entity.
    *
    * @param Categoriablog $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Categoriablog $entity)
    {
        $form = $this->createForm(new CategoriablogType(), $entity, array(
            'action' => $this->generateUrl('admin_categoriablog_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit','submit', array('label' => 'Modificar',
                                               'attr'=>
                                                        array('class'=>'botonpanel btn-success ')));

        return $form;
    }
    /**
     * Edits an existing Categoriablog entity.
     *
     * @Route("/{id}", name="admin_categoriablog_update")
     * @Method("PUT")
     * @Template("DgwebBundle:Categoriablog:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Categoriablog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categoriablog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_categoriablog_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Categoriablog entity.
     *
     * @Route("/{id}", name="admin_categoriablog_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DgwebBundle:Categoriablog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Categoriablog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_categoriablog'));
    }

    /**
     * Creates a form to delete a Categoriablog entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_categoriablog_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
