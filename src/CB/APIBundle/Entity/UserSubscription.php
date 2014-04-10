<?php

namespace CB\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSubscription
 *
 * @ORM\Table(name="user_subscription", indexes={@ORM\Index(name="fk_offer_subscription", columns={"offer"}), @ORM\Index(name="fk_user_subscription", columns={"user"})})
 * @ORM\Entity
 */
class UserSubscription
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
     * @var \Offers
     *
     * @ORM\ManyToOne(targetEntity="Offers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="offer", referencedColumnName="id")
     * })
     */
    private $offer;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
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
     * Set offer
     *
     * @param \CB\APIBundle\Entity\Offers $offer
     * @return UserSubscription
     */
    public function setOffer(\CB\APIBundle\Entity\Offers $offer = null)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return \CB\APIBundle\Entity\Offers 
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set user
     *
     * @param \CB\APIBundle\Entity\Users $user
     * @return UserSubscription
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
