<?php

namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DgwebBundle\Entity\Entrada;
use DgwebBundle\Form\EntradaType;

/**
 * Entrada controller.
 *
 * @Route("/admin/entrada")
 */
class EntradaController extends Controller
{

    /**
     * Lists all Entrada entities.
     *
     * @Route("/", name="admin_entrada")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:Entrada')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Entrada entity.
     *
     * @Route("/", name="admin_entrada_create")
     * @Method("POST")
     * @Template("DgwebBundle:Entrada:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Entrada();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
       
        
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //$em->persist($entity);
            //$em->flush();
            
         
             if($entity->getIdimagen()->getFile()!=null){
                 
                    $path = $this->container->getParameter('photo.imagenblog');

                    $fecha = date('Y-m-d His');
                    $extension = $entity->getIdimagen()->getFile()->getClientOriginalExtension();
                    $nombreArchivo = "imagenblog".$fecha.".".$extension;
                    //$em->persist($entity);
                    //$em->flush();
                    //var_dump($path.$nombreArchivo);

                    $entity->getIdimagen()->setNombre($nombreArchivo);
                    $entity->getIdimagen()->setIdEntrada($entity);
                    $entity->setFecha(new \DateTime('now'));
                    $entity->getIdimagen()->getFile()->move($path,$nombreArchivo);
                    
                    
                }
                $em->persist($entity);
                $em->flush();
               

            return $this->redirect($this->generateUrl('admin_entrada_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Entrada entity.
     *
     * @param Entrada $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Entrada $entity)
    {
        $form = $this->createForm(new EntradaType(), $entity, array(
            'action' => $this->generateUrl('admin_entrada_create'),
            'method' => 'POST',
        ));

        $form->add('submit','submit', array('label' => 'Guardar',
                                               'attr'=>
                                                        array('class'=>'botonpanel btn-success ')));

        return $form;
    }

    /**
     * Displays a form to create a new Entrada entity.
     *
     * @Route("/new", name="admin_entrada_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Entrada();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Entrada entity.
     *
     * @Route("/{id}", name="admin_entrada_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Entrada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entrada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Entrada entity.
     *
     * @Route("/{id}/edit", name="admin_entrada_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Entrada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entrada entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'idimagen'=>$entity->getIdimagen(),
        );
    }

    /**
    * Creates a form to edit a Entrada entity.
    *
    * @param Entrada $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Entrada $entity)
    {
        $form = $this->createForm(new EntradaType(), $entity, array(
            'action' => $this->generateUrl('admin_entrada_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit','submit', array('label' => 'Modificar',
                                               'attr'=>
                                                        array('class'=>'botonpanel btn-success ')));

        return $form;
    }
    /**
     * Edits an existing Entrada entity.
     *
     * @Route("/{id}", name="admin_entrada_update")
     * @Method("PUT")
     * @Template("DgwebBundle:Entrada:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Entrada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entrada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        
        
        $path  = $this->getRequest()->server->get('DOCUMENT_ROOT').'/dgwed/web/Photos/imagenblog/';
        $path2 = $this->container->getParameter('photo.imagenblog');    
       
         

        if ($editForm->isValid()) {
            
            
            
            
             if($entity->getIdimagen()->getFile()!=null){
                    $path = $this->container->getParameter('photo.imagenblog');
                    
                    // $file_path = $path.'/'.$entity->getNombre();
                    //echo '*'.$row->getNombre().'*';
                   // if(file_exists($file_path) && $entity->getNombre()!="") unlink($file_path);

                    $fecha = date('Y-m-d His');
                    $extension = $entity->getIdimagen()->getFile()->getClientOriginalExtension();
                    $nombreArchivo = "imagenblog".$fecha.".".$extension;
               
                    $entity->getIdimagen()->setNombre($nombreArchivo);
                    $entity->getIdimagen()->setIdEntrada($entity);
                    $entity->setFecha(new \DateTime('now'));
                    $entity->getIdimagen()->getFile()->move($path,$nombreArchivo);
                    $em->persist($entity);
                    $em->flush();
                    
                    
                    // $file_path = $path.'/'.$entity->getNombre();        
                    // unlink($file_path);         
                    // $em->flush();
                }
                
                 $em->flush();

            return $this->redirect($this->generateUrl('admin_entrada_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Entrada entity.
     *
     * @Route("/{id}", name="admin_entrada_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DgwebBundle:Entrada')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Entrada entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_entrada'));
    }

    /**
     * Creates a form to delete a Entrada entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_entrada_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
