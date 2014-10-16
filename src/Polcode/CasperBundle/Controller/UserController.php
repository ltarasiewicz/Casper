<?php

namespace Polcode\CasperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\CasperBundle\Entity\User;
use Polcode\CasperBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Request;



class UserController extends Controller {
    
    public function registerAction(Request $request)
    {
        $user = new User;
        $form = $this->createForm('user', $user);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager(); 
            
            
            $em->persist($user);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                    'registration_success',
                    'You have been registered and now can log in.'
            );
            
            return $this->redirect($this->generateUrl('home_page'));
        }
        return $this->render('PolcodeCasperBundle:User:register.html.twig', array('form' => $form->createView()));
    }     
    
}
