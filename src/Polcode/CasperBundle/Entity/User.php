<?php
namespace Polcode\CasperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable
{
    /**    
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */  
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $username;    
    
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $password;
   
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $dateOfBirth;    
    
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $gender;
    
    /**
     * @ORM\OneToMany(targetEntity="Invitation", mappedBy="user")
     */
    protected $invitations;
    
    /**
     * @ORM\OneToMany(targetEntity="Invitation", mappedBy="sender")
     */
    protected $sentInvitations;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Event", mappedBy="guests")
     */
    protected $acceptedEvents;




    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="owner")
     */    
    protected $ownedEvents;
    
    public function __construct() 
    {
        $this->acceptedEvents = new ArrayCollection();
    }
      

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }
    
    /**
     * @inheritDoc
     */    
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */    
    public function getRoles() 
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */    
    public function eraseCredentials() 
    {        
    }
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }
    
    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,            
            $this->usernamem,
        ) = unserialize($serialized);
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Add events
     *
     * @param \Polcode\CasperBundle\Entity\Event $events
     * @return User
     */
    public function addEvent(\Polcode\CasperBundle\Entity\Event $events)
    {
        $this->events[] = $events;

        return $this;
    }

    /**
     * Remove events
     *
     * @param \Polcode\CasperBundle\Entity\Event $events
     */
    public function removeEvent(\Polcode\CasperBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
    
    public function encodePassword($factory)
    {
        $encoder = $factory->getEncoder($this);
        $password = $encoder->encodePassword($this->getPassword(), $this->getSalt());
        $this->setPassword($password);
    }
    

    /**
     * Add invitations
     *
     * @param \Polcode\CasperBundle\Entity\Invitation $invitations
     * @return User
     */
    public function addInvitation(\Polcode\CasperBundle\Entity\Invitation $invitations)
    {
        $this->invitations[] = $invitations;

        return $this;
    }

    /**
     * Remove invitations
     *
     * @param \Polcode\CasperBundle\Entity\Invitation $invitations
     */
    public function removeInvitation(\Polcode\CasperBundle\Entity\Invitation $invitations)
    {
        $this->invitations->removeElement($invitations);
    }

    /**
     * Get invitations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvitations()
    {
        return $this->invitations;
    }

    /**
     * Add sentInvitations
     *
     * @param \Polcode\CasperBundle\Entity\Invitation $sentInvitations
     * @return User
     */
    public function addSentInvitation(\Polcode\CasperBundle\Entity\Invitation $sentInvitations)
    {
        $this->sentInvitations[] = $sentInvitations;

        return $this;
    }

    /**
     * Remove sentInvitations
     *
     * @param \Polcode\CasperBundle\Entity\Invitation $sentInvitations
     */
    public function removeSentInvitation(\Polcode\CasperBundle\Entity\Invitation $sentInvitations)
    {
        $this->sentInvitations->removeElement($sentInvitations);
    }

    /**
     * Get sentInvitations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSentInvitations()
    {
        return $this->sentInvitations;
    }

    /**
     * Add acceptedEvents
     *
     * @param \Polcode\CasperBundle\Entity\Event $acceptedEvents
     * @return User
     */
    public function addAcceptedEvent(\Polcode\CasperBundle\Entity\Event $acceptedEvents)
    {
        $this->acceptedEvents[] = $acceptedEvents;

        return $this;
    }

    /**
     * Remove acceptedEvents
     *
     * @param \Polcode\CasperBundle\Entity\Event $acceptedEvents
     */
    public function removeAcceptedEvent(\Polcode\CasperBundle\Entity\Event $acceptedEvents)
    {
        $this->acceptedEvents->removeElement($acceptedEvents);
    }

    /**
     * Get acceptedEvents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcceptedEvents()
    {
        return $this->acceptedEvents;
    }

    /**
     * Add ownedEvents
     *
     * @param \Polcode\CasperBundle\Entity\Event $ownedEvents
     * @return User
     */
    public function addOwnedEvent(\Polcode\CasperBundle\Entity\Event $ownedEvents)
    {
        $this->ownedEvents[] = $ownedEvents;

        return $this;
    }

    /**
     * Remove ownedEvents
     *
     * @param \Polcode\CasperBundle\Entity\Event $ownedEvents
     */
    public function removeOwnedEvent(\Polcode\CasperBundle\Entity\Event $ownedEvents)
    {
        $this->ownedEvents->removeElement($ownedEvents);
    }

    /**
     * Get ownedEvents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOwnedEvents()
    {
        return $this->ownedEvents;
    }
}
