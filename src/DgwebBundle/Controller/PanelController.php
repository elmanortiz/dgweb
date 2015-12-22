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
 * @Route("/admin/panel")
 */
class PanelController extends Controller{
    
    /**
     * Hace referencia a la pagina del panel administrativo
     *
     * @Route("/", name="admin_panel")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render('DgwebBundle:Panel:panel.html.twig');     
    }
}
