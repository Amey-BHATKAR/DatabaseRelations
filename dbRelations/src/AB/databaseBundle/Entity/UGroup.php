<?php

namespace AB\databaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UGroup
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UGroup
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
     * @ORM\Column(name="groupName", type="string", length=100)
     */
    private $groupName;


    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     **/
    private $users;
    
    public function __construct() {
    	$this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set groupName
     *
     * @param string $groupName
     * @return UGroup
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string 
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * Add users
     *
     * @param \AB\databaseBundle\Entity\User $users
     * @return UGroup
     */
    public function setUsers(\AB\databaseBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \AB\databaseBundle\Entity\User $users
     */
    public function removeUser(\AB\databaseBundle\Entity\User $users)
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
