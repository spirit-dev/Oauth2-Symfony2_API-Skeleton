<?php
// src/Acme/UserBundle/Entity/User.php

namespace CB\APIBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\Column(name="is_active", type="boolean")
    */
    protected $isActive;

    /**
    * @ORM\Column(name="api_key", type="string", length=32)
    */
    protected $apiKey;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    }


    public function getId() {
        return $this->id;
    }

    /**
    * @inheritDoc
    */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
    * @inheritDoc
    */
    public function eraseCredentials()
    {
    }

    /**
    * @see \Serializable::serialize()
    */
    public function serialize()
    {
        return serialize(
            array(
                $this->id,
            )
        );
    }

    /**
    * @see \Serializable::unserialize()
    */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }
}