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
 * @Route("/admin/team")
 */
class TeamController extends Controller{
    
    /**
     * Hace referencia a la pagina principal de inicio
     *
     * @Route("/", name="admin_team")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render('DgwebBundle:Team:team.html.twig');     
    }
}
