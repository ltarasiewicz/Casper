<?php

namespace Polcode\CasperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\CasperBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class UserController extends Controller {
    
    public function registerAction()
    {
        return $this->render('PolcodeCasperBundle:User:register.html.twig');
    }     
    
}
