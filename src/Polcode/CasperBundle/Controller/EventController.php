<?php
namespace Polcode\CasperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\CasperBundle\Entity\Event;
use Polcode\CasperBundle\Entity\User;
use Polcode\CasperBundle\Form\Type\EventType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Response;

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
    
    public function showPublicEventsAction()
    {
        $publicEvents = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Event')
                ->findBy(
                      array('public' => true)
                );
        
        return $this->render('PolcodeCasperBundle:Event:public.html.twig', array('publicEvents' => $publicEvents));
    }
    
    public function showSingleEventAction($id)
    {
        $singleEvent = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Event')
                ->find($id);
        
        return $this->render('PolcodeCasperBundle:Event:single.html.twig', array('singleEvent' => $singleEvent));
        
    }
    
    public function showUserEventsAction()
    {       
        $user = $this->getUser();
        
        $ownedEvents = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Event')
                ->findBy(array(
                    'owner' => $user,
                ));
                
        return $this->render('PolcodeCasperBundle:Event:my.html.twig', array('ownedEvents' => $ownedEvents));
    }
    
    public function editEventAction($id, Request $request)
    {
        $eventToEdit = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Event')
                ->find($id);
        
        if ( ! $eventToEdit ) {
            throw $this->createNotFoundException('The event does not exist');
        }
        
        $form = $this->createForm('event', $eventToEdit);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();                    
                       
            $em->flush();
                       
        }
                
        return $this->render('PolcodeCasperBundle:Event:edit.html.twig', array('form' => $form->createView()));
    }
    
    public function removeEventAction($id, Request $request)
    {
        $eventToRemove = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Event')
                ->find($id);
        
        if ( ! $eventToRemove) {
            throw $this->createNotFoundException('The event does not exist');
        }
        
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($eventToRemove);
        
        $em->flush();
        
        return new Response('OK');
        
    }    
    
}