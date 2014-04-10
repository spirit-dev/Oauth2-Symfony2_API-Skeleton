<?php

namespace CB\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offers
 *
 * @ORM\Table(name="offers", indexes={@ORM\Index(name="fk_offer_scale", columns={"offer_payment_scale"})})
 * @ORM\Entity
 */
class Offers
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
     * @var string
     *
     * @ORM\Column(name="offer_name", type="string", length=2000, nullable=true)
     */
    private $offerName;

    /**
     * @var string
     *
     * @ORM\Column(name="offer_description", type="text", nullable=true)
     */
    private $offerDescription;

    /**
     * @var float
     *
     * @ORM\Column(name="offer_amount", type="float", precision=10, scale=0, nullable=true)
     */
    private $offerAmount;

    /**
     * @var \OfferScale
     *
     * @ORM\ManyToOne(targetEntity="OfferScale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="offer_payment_scale", referencedColumnName="id")
     * })
     */
    private $offerPaymentScale;



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
     * Set offerName
     *
     * @param string $offerName
     * @return Offers
     */
    public function setOfferName($offerName)
    {
        $this->offerName = $offerName;

        return $this;
    }

    /**
     * Get offerName
     *
     * @return string 
     */
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * Set offerDescription
     *
     * @param string $offerDescription
     * @return Offers
     */
    public function setOfferDescription($offerDescription)
    {
        $this->offerDescription = $offerDescription;

        return $this;
    }

    /**
     * Get offerDescription
     *
     * @return string 
     */
    public function getOfferDescription()
    {
        return $this->offerDescription;
    }

    /**
     * Set offerAmount
     *
     * @param float $offerAmount
     * @return Offers
     */
    public function setOfferAmount($offerAmount)
    {
        $this->offerAmount = $offerAmount;

        return $this;
    }

    /**
     * Get offerAmount
     *
     * @return float 
     */
    public function getOfferAmount()
    {
        return $this->offerAmount;
    }

    /**
     * Set offerPaymentScale
     *
     * @param \CB\APIBundle\Entity\OfferScale $offerPaymentScale
     * @return Offers
     */
    public function setOfferPaymentScale(\CB\APIBundle\Entity\OfferScale $offerPaymentScale = null)
    {
        $this->offerPaymentScale = $offerPaymentScale;

        return $this;
    }

    /**
     * Get offerPaymentScale
     *
     * @return \CB\APIBundle\Entity\OfferScale 
     */
    public function getOfferPaymentScale()
    {
        return $this->offerPaymentScale;
    }
}
