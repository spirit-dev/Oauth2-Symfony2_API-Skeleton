<?php

namespace CB\APIBundle\Handler;

use CB\APIBundle\Model\OfferScaleInterface;

interface OfferScaleHandlerInterface
{
    /**
    * Get a offerscale given the identifier
    *
    * @api
    *
    * @param mixed $id
    *
    * @return OfferScaleInterface
    */
    public function get($id);
    
    /**
    * Get a list of offerscales.
    *
    * @param int $limit the limit of the result
    * @param int $offset starting from the offset
    *
    * @return array
    */
    public function all($limit = 5, $offset = 0);
    
    /**
    * Post OfferScale, creates a new OfferScale.
    *
    * @api
    *
    * @param array $parameters
    *
    * @return OfferScaleInterface
    */
    public function post(array $parameters);
    
    /**
    * Edit a OfferScale.
    *
    * @api
    *
    * @param OfferScaleInterface $offer_scale
    * @param array $parameters
    *
    * @return OfferScaleInterface
    */    
    public function put(OfferScaleInterface $offer_scale, array $parameters);
    
    /**
    * Partially update a OfferScale.
    *
    * @api
    *
    * @param OfferScaleInterface $offer_scale
    * @param array $parameters
    *
    * @return OfferScaleInterface
    */
    public function patch(OfferScaleInterface $offer_scale, array $parameters);
    
    /**
    * Delete an OfferScale.
    *
    * @api
    *
    * @param OfferScaleInterface $offer_scale
    * @param array $parameters
    *
    * @return OfferScaleInterface
    */
    public function remove(OfferScaleInterface $offer_scale, array $parameters);
}