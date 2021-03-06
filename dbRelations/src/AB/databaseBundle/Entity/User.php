<?php

namespace AB\databaseBundle\Entity;

use AB\databaseBundle\Entity\Address;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=30)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=30)
     */
    private $lastName;

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneNumber", type="integer")
     */
    private $phoneNumber;


    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     **/
    private $addresses;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="UGroup", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     **/
    private $groups;
    
    public function __construct() {
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set addresses
     *
     * @param \AB\databaseBundle\Entity\Address $addresses
     * @return User
     */
    public function setAddresses(\AB\databaseBundle\Entity\Address $addresses = null)
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * Get addresses
     *
     * @return \AB\databaseBundle\Entity\Address 
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Add groups
     *
     * @param \AB\databaseBundle\Entity\Group $groups
     * @return User
     */
    public function setGroups(\AB\databaseBundle\Entity\UGroup $groups)
    {
    	$groups->addUser($this);
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \AB\databaseBundle\Entity\Group $groups
     */
    public function removeGroup(\AB\databaseBundle\Entity\UGroup $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }
    
    public function __toString()
    {
    	$sendString = $this->firstName.", ".$this->lastName;
    	return $sendString;
    }
}
