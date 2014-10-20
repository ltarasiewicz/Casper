<?php
namespace Polcode\CasperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\CasperBundle\Entity\User;
use Polcode\CasperBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;



class UserController extends Controller {
    
    public function loginAction(Request $request)
    {
       $session = $request->getSession();
       
       // get the login error if there is one
       if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
           $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR                   
           );
       } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
           $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
           $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
       } else {
           $error = '';
       }
       
       //last username entered by the user
       $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);
        
        return $this->render(
                'PolcodeCasperBundle:User:login.html.twig', 
                array(
                    // last username entered by the user
                    'last_username' => $lastUsername,
                    'error' => $error,
                )
        );
    }   
    
    public function registerAction(Request $request)
    {
        $user = new User;
        $form = $this->createForm('user', $user);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager(); 
            
            $factory = $this->get('security.encoder_factory');

            $user->encodePassword($factory);
            
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
