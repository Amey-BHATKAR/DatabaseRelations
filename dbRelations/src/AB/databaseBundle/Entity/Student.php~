<?php

namespace AB\databaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Student
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
     * @ORM\Column(name="firstName", type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=100)
     */
    private $lastName;


    /**
     * @ORM\OneToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="mentor_id", referencedColumnName="id")
     **/
    private $mentor;
    
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
     * @return Student
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
     * @return Student
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
     * Set mentor
     *
     * @param \AB\databaseBundle\Entity\Student $mentor
     * @return Student
     */
    public function setMentor(\AB\databaseBundle\Entity\Student $mentor = null)
    {
        $this->mentor = $mentor;

        return $this;
    }

    /**
     * Get mentor
     *
     * @return \AB\databaseBundle\Entity\Student 
     */
    public function getMentor()
    {
        return $this->mentor;
    }
    
    public function __toString()
    {
    	$sendString = $this->firstName.", ".$this->lastName;
    	return $sendString;
    }
}
