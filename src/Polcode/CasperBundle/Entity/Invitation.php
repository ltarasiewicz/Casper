<?php
namespace Polcode\CasperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="invitation")
 */
class Invitation
{   
    
    /**    
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */  
    protected $id;    
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sentInvitations")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     */
    protected $sender; 
    
    /**
     * @ORM\ManytoOne(targetEntity="User", inversedBy="invitations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="invitations")     
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */    
    protected $event;
    
     /**
      * @ORM\Column(type="string", nullable=true)
      */    
    protected $status = 'pending';
    
     /**
      * @ORM\Column(type="datetime", nullable=true)
      */    
    protected $createdAt;
    
    public function __construct($user, $event)
    {
        $this->user = $user;
        $this->event = $event;
        $this->sender = $event->getOwner();
        $this->createdAt = new \DateTime;     
    }
    
    public function getUser()
    {
        return $this->user;
    }
    
    public function getEvent()
    {
        return $this->event;
    }
    
    public function getStatus()
    {
        return $this->status;
    }    
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }    
    
    public function accept() {
        $this->status = 'accepted';
    }
    
    public function decline() {
        $this->status = 'declined';
    }
    
}
