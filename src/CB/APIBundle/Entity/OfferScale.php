<?php

namespace CB\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use CB\APIBundle\Model\OfferScaleInterface;

/**
 * OfferScale
 *
 * @ORM\Table(name="offer_scale")
 * @ORM\Entity
 */
class OfferScale implements OfferScaleInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="offer_scale_name", type="string", length=255, nullable=true)
     */
    private $offerScaleName;



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
     * Set offerScaleName
     *
     * @param string $offerScaleName
     * @return OfferScale
     */
    public function setOfferScaleName($offerScaleName)
    {
        $this->offerScaleName = $offerScaleName;

        return $this;
    }

    /**
     * Get offerScaleName
     *
     * @return string 
     */
    public function getOfferScaleName()
    {
        return $this->offerScaleName;
    }
}
