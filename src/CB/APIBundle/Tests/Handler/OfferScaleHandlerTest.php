<?php

namespace CB\APIBundle\Tests\Handler;

use CB\APIBundle\Handler\OfferScaleHandler;
use CB\APIBundle\Model\OfferScaleInterface;
use CB\APIBundle\Entity\OfferScale;

class OfferScaleHandlerTest extends \PHPUnit_Framework_TestCase
{

	const OFFERSCALE_CLASS = 'CB\APIBundle\Tests\Handler\DummyOfferScale';

	/** @var PageHandler */
    protected $offerScaleHandler;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $om;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $repository;

    public function setUp()
    {
        if (!interface_exists('Doctrine\Common\Persistence\ObjectManager')) {
            $this->markTestSkipped('Doctrine Common has to be installed for this test to run.');
        }
        
        $class = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');
        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $this->formFactory = $this->getMock('Symfony\Component\Form\FormFactoryInterface');

        $this->om->expects($this->any())
            ->method('getRepository')
            ->with($this->equalTo(static::OFFERSCALE_CLASS))
            ->will($this->returnValue($this->repository));
        $this->om->expects($this->any())
            ->method('getClassMetadata')
            ->with($this->equalTo(static::OFFERSCALE_CLASS))
            ->will($this->returnValue($class));
        $class->expects($this->any())
            ->method('getName')
            ->will($this->returnValue(static::OFFERSCALE_CLASS));
    }

	public function testGet() {
		$id = 1;
		$offer_scale = $this->getOfferScale(); // create a Page object
		// I expect that the Page repository is called with find(1)
		$this->repository->expects($this->once())
			->method('find')
			->with($this->equalTo($id))
			->will($this->returnValue($offer_scale));

		$this->offerScaleHandler = $this->createOfferScaleHandler($this->om, static::OFFERSCALE_CLASS,  $this->formFactory);

		$this->offerScaleHandler->get($id); // call the get.
	}

	protected function getOfferScale()
    {
        $offerScaleClass = static::OFFERSCALE_CLASS;

        return new $offerScaleClass();
    }

    protected function createOfferScaleHandler($objectManager, $offerScaleClass, $formFactory)
    {
        return new OfferScaleHandler($objectManager, $offerScaleClass, $formFactory);
    }
}

class DummyOfferScale extends OfferScale
{
}