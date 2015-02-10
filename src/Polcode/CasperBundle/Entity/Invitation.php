<?php
namespace Polcode\CasperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="invitation")
 * 
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
    
    public function __construct(Event $event, $user)
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
	   
       $this->user->addAcceptedEvent($this->event);
	   
       $this->event->addGuest($this->user);
        
    }
    
    public function decline() {
        
        $this->status = 'declined';
        
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Invitation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Invitation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set sender
     *
     * @param \Polcode\CasperBundle\Entity\User $sender
     * @return Invitation
     */
    public function setSender(\Polcode\CasperBundle\Entity\User $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \Polcode\CasperBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set user
     *
     * @param \Polcode\CasperBundle\Entity\User $user
     * @return Invitation
     */
    public function setUser(\Polcode\CasperBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Set event
     *
     * @param \Polcode\CasperBundle\Entity\Event $event
     * @return Invitation
     */
    public function setEvent(\Polcode\CasperBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }
}
