<?php

namespace AB\databaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feature
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Feature
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
     * @ORM\Column(name="featureName", type="string", length=100)
     */
    private $featureName;


    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="features")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product;
    
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
     * Set featureName
     *
     * @param string $featureName
     * @return Feature
     */
    public function setFeatureName($featureName)
    {
        $this->featureName = $featureName;

        return $this;
    }

    /**
     * Get featureName
     *
     * @return string 
     */
    public function getFeatureName()
    {
        return $this->featureName;
    }

    /**
     * Set product
     *
     * @param \AB\databaseBundle\Entity\Product $product
     * @return Feature
     */
    public function setProduct(\AB\databaseBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AB\databaseBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
