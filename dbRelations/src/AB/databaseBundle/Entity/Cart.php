<?php

namespace AB\databaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cart
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
     * @ORM\Column(name="objectName", type="string", length=100)
     */
    private $objectName;

    /**
     * @var integer
     *
     * @ORM\Column(name="objectQuantity", type="integer")
     */
    private $objectQuantity;


    /**
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     **/
    private $customer;
    
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
     * Set objectName
     *
     * @param string $objectName
     * @return Cart
     */
    public function setObjectName($objectName)
    {
        $this->objectName = $objectName;

        return $this;
    }

    /**
     * Get objectName
     *
     * @return string 
     */
    public function getObjectName()
    {
        return $this->objectName;
    }

    /**
     * Set objectQuantity
     *
     * @param integer $objectQuantity
     * @return Cart
     */
    public function setObjectQuantity($objectQuantity)
    {
        $this->objectQuantity = $objectQuantity;

        return $this;
    }

    /**
     * Get objectQuantity
     *
     * @return integer 
     */
    public function getObjectQuantity()
    {
        return $this->objectQuantity;
    }

    /**
     * Set customer
     *
     * @param \AB\databaseBundle\Entity\Customer $customer
     * @return Cart
     */
    public function setCustomer(\AB\databaseBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AB\databaseBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
    
    
}
