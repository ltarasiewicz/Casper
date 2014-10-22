<?php
namespace Polcode\CasperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\CasperBundle\Entity\Event;
use Polcode\CasperBundle\Entity\User;
use Polcode\CasperBundle\Entity\Invitation;
use Polcode\CasperBundle\Form\Type\EventType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Response;

class InvitationController extends Controller 
{
    public function sendInvitationsAction(Request $request)
    {
        $eventId = $request->request->get('eventToInviteTo');
        
        $userId = $request->request->get('userToInvite');
        
        $eventToInviteTo = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Event')
                ->find($eventId);
                      
        $userToInvite = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:User')
                ->find($userId);        
                   
        $invitation = new Invitation($eventToInviteTo, $userToInvite);
        
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($invitation);
        
        $em->flush();
        
        return $this->redirect($this->generateUrl('home_page'));        
        
    }
    
    public function acceptInvitationAction($id)
    {
        $invitationToAccept = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Invitation')
                ->findOneByEvent($id);
              
        $invitationToAccept->accept();

        
        $em = $this->getDoctrine()->getManager();
        
        $em->flush();
        
        return $this->redirect($this->generateUrl('my_events'));
        
    }
    
    public function declineInvitationAction($id)
    {
        $invitationToAccept = $this->getDoctrine()
                ->getRepository('PolcodeCasperBundle:Invitation')
                ->findOneByEvent($id);    
        
        $invitationToAccept->decline();
        
        $em = $this->getDoctrine()->getManager();
        
        $em->flush();   
        
        return $this->redirect($this->generateUrl('my_events'));
        
    }
    
}