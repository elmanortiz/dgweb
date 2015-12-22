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
 * @Route("/admin/contact")
 */
class ContactController extends Controller{
    
    /**
     * Hace referencia a la pagina Team
     *
     * @Route("/", name="admin_contact")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render('DgwebBundle:Contact:contact.html.twig');     
    }
}
