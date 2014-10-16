<?php

namespace Polcode\CasperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */

class User 
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
    protected $nickName;    
    
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $password;
    
     /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $repeatPassword;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $dateOfBirth;    
    
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $gender;
    
    /**
     * @ORM\ManyToMany(targetEntity="Event", inversedBy="users")
     * @ORM\JoinTable(name="users_events")
     */
    private $events;
    
    public function __construct() 
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nickName
     *
     * @param string $nickName
     * @return User
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * Get nickName
     *
     * @return string 
     */
    public function getNickName()
    {
        return $this->nickName;
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
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
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
     * Set repeatPassword
     *
     * @param string $repeatPassword
     * @return User
     */
    public function setRepeatPassword($repeatPassword)
    {
        $this->repeatPassword = $repeatPassword;

        return $this;
    }

    /**
     * Get repeatPassword
     *
     * @return string 
     */
    public function getRepeatPassword()
    {
        return $this->repeatPassword;
    }
}
