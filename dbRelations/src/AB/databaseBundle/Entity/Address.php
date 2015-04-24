<?php

namespace AB\databaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Address
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
     * @var integer
     *
     * @ORM\Column(name="roomNumber", type="integer")
     */
    private $roomNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="buildingNumber", type="integer")
     */
    private $buildingNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="streetName", type="string", length=255)
     */
    private $streetName;

    /**
     * @var integer
     *
     * @ORM\Column(name="pinCode", type="integer")
     */
    private $pinCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=30)
     */
    private $city;

    
    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="addresses")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     **/
    private $contact;

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
     * Set roomNumber
     *
     * @param integer $roomNumber
     * @return Address
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get roomNumber
     *
     * @return integer 
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * Set buildingNumber
     *
     * @param integer $buildingNumber
     * @return Address
     */
    public function setBuildingNumber($buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;

        return $this;
    }

    /**
     * Get buildingNumber
     *
     * @return integer 
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * Set streetName
     *
     * @param string $streetName
     * @return Address
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * Get streetName
     *
     * @return string 
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set pinCode
     *
     * @param integer $pinCode
     * @return Address
     */
    public function setPinCode($pinCode)
    {
        $this->pinCode = $pinCode;

        return $this;
    }

    /**
     * Get pinCode
     *
     * @return integer 
     */
    public function getPinCode()
    {
        return $this->pinCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
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
    
    public function __toString()
    {
    	$sendString = $this->roomNumber.", ".$this->buildingNumber.", ".$this->streetName.", ".$this->pinCode.", ".$this->city;
    	return $sendString;
    }
}
