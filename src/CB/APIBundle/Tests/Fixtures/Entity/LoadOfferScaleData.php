<?php

namespace Acme\BlogBundle\Tests\Fixtures\Entity;

use Acme\BlogBundle\Entity\Page;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadOfferScaleData implements FixtureInterface
{
    public function testGet()
    {
        $fixtures = array('CB\APIBundle\Tests\Fixtures\Entity\LoadOfferScaleData');
        $this->customSetUp($fixtures);
        $offer_scale = array_pop(LoadOfferScaleData::$offer_scales);

        $route =  $this->getUrl('api_1_offer_scale', array('id' => $offer_scale->getId(), '_format' => 'json'));
        $this->client->request('GET', $route);
        $response = $this->client->getResponse();
        $this->assertJsonResponse($response, 200);
        $content = $response->getContent();

        $decoded = json_decode($content, true);
        $this->assertTrue(isset($decoded['id']));
    }
}