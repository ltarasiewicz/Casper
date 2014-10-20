<?php

namespace Polcode\CasperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="event")
 */

class Event 
{
    /**    
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */  
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $name;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $public;
    
    
    /**
     *  @ORM\Column(type="string", length=50)
     */
    protected $country;
    
     /**
     *  @ORM\Column(type="string", length=50)
     */   
    protected $city;
    
    /**
     *  @ORM\Column(type="string", length=10)
     */
    protected $postcode;
    
    /**
     * @ORM\Column(type="datetimetz")     
     */
    protected $date;
    
    /**
     * @ORM\Column(type="integer")   
     */
    protected $duration;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="integer")   
     */    
    protected $maxGuests;

    /**
     * @ORM\Column(type="datetimetz")     
     */
    protected $signupDeadline;
    
     /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="eventsInvitedTo")  
     * @ORM\JoinTable(name="invitedGuests_eventsInvitedTo")
     */     
    protected $invitedGuests;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="events")
     */
    protected $attendees;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="ownedEvents")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    protected $owner;
    
    public function __construct() 
    {
        $this->users = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return Event
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Event
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Event
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postocode
     *
     * @param string $postocode
     * @return Event
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postocode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Event
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set maxGuests
     *
     * @param integer $maxGuests
     * @return Event
     */
    public function setMaxGuests($maxGuests)
    {
        $this->maxGuests = $maxGuests;

        return $this;
    }

    /**
     * Get maxGuests
     *
     * @return integer 
     */
    public function getMaxGuests()
    {
        return $this->maxGuests;
    }

    /**
     * Set signupDeadline
     *
     * @param \DateTime $signupDeadline
     * @return Event
     */
    public function setSignupDeadline($signupDeadline)
    {
        $this->signupDeadline = $signupDeadline;

        return $this;
    }

    /**
     * Get signupDeadline
     *
     * @return \DateTime 
     */
    public function getSignupDeadline()
    {
        return $this->signupDeadline;
    }

    /**
     * Set attendees
     *
     * @param integer $attendees
     * @return Event
     */
    public function setAttendees($attendees)
    {
        $this->attendees = $attendees;

        return $this;
    }

    /**
     * Get attendees
     *
     * @return integer 
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * Set invitedGuests
     *
     * @param integer $invitedGuests
     * @return Event
     */
    public function setInvitedGuests($invitedGuests)
    {
        $this->invitedGuests = $invitedGuests;

        return $this;
    }

    /**
     * Get invitedGuests
     *
     * @return integer 
     */
    public function getInvitedGuests()
    {
        return $this->invitedGuests;
    }

    /**
     * Set owner
     *
     * @param integer $owner
     * @return Event
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return integer 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add users
     *
     * @param \Polcode\CasperBundle\Entity\User $users
     * @return Event
     */
    public function addUser(\Polcode\CasperBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Polcode\CasperBundle\Entity\User $users
     */
    public function removeUser(\Polcode\CasperBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
