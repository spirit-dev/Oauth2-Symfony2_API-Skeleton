<?php

namespace CB\APIBundle\Model;

Interface OfferScaleInterface  {

 	/**
	* Set title
	*
	* @param string $offerScaleName
	* @return OfferScaleInterface
	*/
	public function setOfferScaleName($offerScaleName);

    /**
	* Get offerScaleName
	*
	* @return string
	*/
	public function getOfferScaleName();
	
}