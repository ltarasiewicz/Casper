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
     * @ORM\Column(type="string", length=50)
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $nickName;    
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $password;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $dob;    
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $male;
    
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
     * Set dob
     *
     * @param \DateTime $dob
     * @return User
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set male
     *
     * @param boolean $male
     * @return User
     */
    public function setMale($male)
    {
        $this->male = $male;

        return $this;
    }

    /**
     * Get male
     *
     * @return boolean 
     */
    public function getMale()
    {
        return $this->male;
    }
}
