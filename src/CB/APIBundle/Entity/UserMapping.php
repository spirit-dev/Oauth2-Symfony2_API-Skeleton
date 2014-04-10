<?php

namespace CB\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserMapping
 *
 * @ORM\Table(name="user_mapping", indexes={@ORM\Index(name="fk_user_dirs", columns={"ref_dir"}), @ORM\Index(name="fk_user_has_map", columns={"user_id"})})
 * @ORM\Entity
 */
class UserMapping
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DirectoriesArchitecture
     *
     * @ORM\ManyToOne(targetEntity="DirectoriesArchitecture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_dir", referencedColumnName="id")
     * })
     */
    private $refDir;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set refDir
     *
     * @param \CB\APIBundle\Entity\DirectoriesArchitecture $refDir
     * @return UserMapping
     */
    public function setRefDir(\CB\APIBundle\Entity\DirectoriesArchitecture $refDir = null)
    {
        $this->refDir = $refDir;

        return $this;
    }

    /**
     * Get refDir
     *
     * @return \CB\APIBundle\Entity\DirectoriesArchitecture 
     */
    public function getRefDir()
    {
        return $this->refDir;
    }

    /**
     * Set user
     *
     * @param \CB\APIBundle\Entity\Users $user
     * @return UserMapping
     */
    public function setUser(\CB\APIBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CB\APIBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }
}
