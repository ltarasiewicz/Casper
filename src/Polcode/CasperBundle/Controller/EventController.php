<?php
namespace Polcode\CasperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\CasperBundle\Entity\Event;
use Polcode\CasperBundle\Entity\User;
use Polcode\CasperBundle\Form\Type\EventType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class EventController extends Controller 
{
    public function addEventAction(Request $request)
    {
        $event = new Event;
        $form = $this->createForm('event', $event);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            
            
            $event->setOwner($this->getUser());
                       
            $em->persist($event);
            $em->flush();
                       
        }
        return $this->render('PolcodeCasperBundle:Event:add.html.twig', array('form' => $form->createView()));        
    }
}