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
 * @Route("/admin/careers")
 */
class CareersController extends Controller{
    
    /**
     * Hace referencia a la pagina Team
     *
     * @Route("/", name="admin_careers")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render('DgwebBundle:Careers:careers.html.twig');     
    }
}
