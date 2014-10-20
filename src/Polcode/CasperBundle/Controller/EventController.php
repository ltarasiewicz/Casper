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
                    'id' => $user,
                ));
                
        return $this->render('PolcodeCasperBundle:Event:my.html.twig', array('ownedEvents' => $ownedEvents));
    }
    
    public function editEventAction($id, Request $request)
    {
        $eventToEdit = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Event')
                ->find($id);
        $form = $this->createForm('event', $eventToEdit);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();                    
                       
            $em->persist($eventToEdit);
            $em->flush();
                       
        }
                
        return $this->render('PolcodeCasperBundle:Event:edit.html.twig', array('form' => $form->createView()));
    }
    
}