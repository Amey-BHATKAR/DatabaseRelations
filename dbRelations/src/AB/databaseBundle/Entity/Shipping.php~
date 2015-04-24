<?php

namespace AB\databaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shipping
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Shipping
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
     * @ORM\Column(name="toName", type="string", length=100)
     */
    private $toName;


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
     * Set toName
     *
     * @param string $toName
     * @return Shipping
     */
    public function setToName($toName)
    {
        $this->toName = $toName;

        return $this;
    }

    /**
     * Get toName
     *
     * @return string 
     */
    public function getToName()
    {
        return $this->toName;
    }
}
