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
 * @Route("/admin/services")
 */
class ServicesController extends Controller{
    
    /**
     * Hace referencia a la pagina de servicios
     *
     * @Route("/", name="admin_services")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render('DgwebBundle:Services:services.html.twig');     
    }
}
