<?php

namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DgwebBundle\Entity\Proyecto;
use DgwebBundle\Entity\ImagenProyecto;
use DgwebBundle\Form\ProyectoType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Proyecto controller.
 *
 * @Route("/admin/proyecto")
 */
class ProyectoController extends Controller
{

    /**
     * Lists all Proyecto entities.
     *
     * @Route("/", name="admin_proyecto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:Proyecto')->findAll();
        
        $proyectos = $em->getRepository('DgwebBundle:Categoriaport')->findAll();

        return array(
           'entities' => $entities,
            'categoriasProyectos'=>$proyectos,
           // 'fotos'=>$fotos,
            
        );
    }
    /**
     * Creates a new Proyecto entity.
     *
     * @Route("/", name="admin_proyecto_create")
     * @Method("POST")
     * @Template("DgwebBundle:Proyecto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Proyecto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
              foreach($entity->getPlacas() as $row){
            
                if($row->getFile()!=null){
                    $path = $this->container->getParameter('photo.proyecto');

                    $fecha = date('Y-m-d His');
                    $extension = $row->getFile()->getClientOriginalExtension();
                    $nombreArchivo = $row->getId()."-"."Imagen"."-".$fecha.".".$extension;

                    $row->setImagen($nombreArchivo);
                    $row->getFile()->move($path,$nombreArchivo);

                    $em->persist($row);
                    $em->flush();

                }  
           } 

            return $this->redirect($this->generateUrl('admin_proyecto', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Proyecto entity.
     *
     * @param Proyecto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Proyecto $entity)
    {
        $form = $this->createForm(new ProyectoType(), $entity, array(
            'action' => $this->generateUrl('admin_proyecto_create'),
            'method' => 'POST',
        ));

        $form->add('submit','submit', array('label' => 'Guardar',
                                               'attr'=>
                                                        array('class'=>'btn btn-success btn-sm')));

        return $form;
    }

    /**
     * Displays a form to create a new Proyecto entity.
     *
     * @Route("/new", name="admin_proyecto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Proyecto();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Proyecto entity.
     *
     * @Route("/{id}", name="admin_proyecto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Proyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Proyecto entity.
     *
     * @Route("/{id}/edit", name="admin_proyecto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Proyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'placas'=>$entity->getPlacas(),
        );
    }

    /**
    * Creates a form to edit a Proyecto entity.
    *
    * @param Proyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Proyecto $entity)
    {
        $form = $this->createForm(new ProyectoType(), $entity, array(
            'action' => $this->generateUrl('admin_proyecto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit','submit', array('label' => 'Modificar',
                                               'attr'=>
                                                        array('class'=>'btn btn-success btn-sm')));

        return $form;
    }
    /**
     * Edits an existing Proyecto entity.
     *
     * @Route("/{id}", name="admin_proyecto_update")
     * @Method("PUT")
     * @Template("DgwebBundle:Proyecto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DgwebBundle:Proyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }
        
        $originalImagenes= new ArrayCollection();
        $path  = $this->getRequest()->server->get('DOCUMENT_ROOT').'/dgweb/web/Photos/proyecto/';
        $path2 = $this->container->getParameter('photo.proyecto');    
        // Create an ArrayCollection of the current Tag objects in the database
        $i=0;
        
        $originalImagenes = $entity->getPlacas();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            
             foreach ($entity->getPlacas() as $row) {
            
                        
            
               // $galeriaImagenes = new Carrusel();
                if($row->getFile()!=null){
                    $file_path = $path.'/'.$row->getImagen();
                    //echo '*'.$row->getNombre().'*';
                    if(file_exists($file_path) && $row->getImagen()!="") unlink($file_path);
                    //var_dump($row->getFile());
                    //die();
                    //echo "vc";
                    $fecha = date('Y-m-d His');
                    $extension = $row->getFile()->getClientOriginalExtension();
                    $nombreArchivo = "proyecto - ".$i." - ".$fecha.".".$extension;

                    //echo $nombreArchivo;
                    //$seguimiento->setFotoAntes($nombreArchivo);


                    $row->setImagen($nombreArchivo);
                    //$imagenConsulta->setConsulta($entity);
                    //array_push($placas, $imagenConsulta);
                    $row->getFile()->move($path2,$nombreArchivo);
                    //$em->merge($seguimiento);
                    $em->persist($row);
                    //$em->flush();
                    $i++;

                }
            
        }
            
        
        
            foreach ($originalImagenes as $row) {
                if (false === $entity->getPlacas()->contains($row)) {
                    // remove the Task from the Tag
                    //$row->getIdcategoria()->removeImagen($row);

                    // if it was a many-to-one relationship, remove the relationship like this
                    //$row->setIdcategoria(null);

                    //$em->persist($row);

                    // if you wanted to delete the Tag entirely, you can also do that
                     $em->remove($row);
                     $em->flush();
                }
            }
            
            
            
            
            $em->flush();

            return $this->redirect($this->generateUrl('admin_proyecto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Proyecto entity.
     *
     * @Route("/{id}", name="admin_proyecto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DgwebBundle:Proyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Proyecto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_proyecto'));
    }

    /**
     * Creates a form to delete a Proyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_proyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
