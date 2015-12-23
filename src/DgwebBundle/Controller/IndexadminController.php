<?php

namespace DgwebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Categoria controller.
 *
 * @Route("/admin/indexadmin")
 */
class IndexadminController extends Controller{
    
    /**
     * Hace referencia a la pagina Team
     *
     * @Route("/", name="admin_indexadmin")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DgwebBundle:Proyecto')->findAll();

//        return array(
//            'entities' => $entities,
//        );
         return $this->render('DgwebBundle:Proyecto:indexadmin.html.twig',array('entities' => $entities));     
    }
}
