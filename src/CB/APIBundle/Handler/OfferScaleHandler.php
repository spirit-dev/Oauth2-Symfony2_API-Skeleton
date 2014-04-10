<?php

namespace CB\APIBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use CB\APIBundle\Model\OfferScaleInterface;
use CB\APIBundle\Form\OfferScaleType;
use CB\APIBundle\Exception\InvalidFormException;

class OfferScaleHandler implements OfferScaleHandlerInterface {

    private $om;
    private $entityClass;
    private $repository;
    private $formFactory;

    // ..
    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
    }

    /**
     * Get a offerscale.
     *
     * @param mixed $id
     *
     * @return PageInterface
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }


    /**
     * Get a list of offerscales.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0, $orderby = null)
    {
        return $this->repository->findBy(array(), $orderby, $limit, $offset);
    }

    /**
    * Create a new Page.
    *
    * @param array $parameters
    *
    * @return PageInterface
    */
    public function post(array $parameters)
    {
        $offer_scale = $this->createOfferScale();

        return $this->processForm($offer_scale, $parameters, 'POST');
    }

    /**
     * Edit a OfferScale, or create if not exist.
     *
     * @param OfferScaleInterface $offer_scale
     * @param array         $parameters
     *
     * @return OfferScaleInterface
     */
    public function put(OfferScaleInterface $offer_scale, array $parameters)
    {
        return $this->processForm($offer_scale, $parameters, 'PUT');
    }

    /**
     * Partially update a OfferScale.
     *
     * @param OfferScaleInterface $offer_scale
     * @param array         $parameters
     *
     * @return OfferScaleInterface
     */
    public function patch(OfferScaleInterface $offer_scale, array $parameters)
    {
        return $this->processForm($offer_scale, $parameters, 'PATCH');
    }

    /**
     * Delete an OfferScale.
     *
     * @param OfferScaleInterface $offer_scale
     * @param array         $parameters
     *
     * @return OfferScaleInterface
     */
    public function remove(OfferScaleInterface $offer_scale, array $parameters)
    {
        return $this->processDelete($offer_scale, $parameters, 'DELETE');
    }

    /**
    * Processes the form.
    *
    * @param OfferScaleInterface $offer_scale
    * @param array $parameters
    * @param String $method
    *
    * @return OfferScaleInterface
    *
    * @throws \CB\APIBundle\Exception\InvalidFormException
    */
    private function processForm(OfferScaleInterface $offer_scale, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new OfferScaleType(), $offer_scale, array('method' => $method));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {

            $offer_scale = $form->getData();
            $this->om->persist($offer_scale);
            $this->om->flush($offer_scale);

            return $offer_scale;
        }

        throw new InvalidFormException('Invalid submitted data', $form);
    }

    /**
    * Processes the deletion form.
    *
    * @param OfferScaleInterface $offer_scale
    * @param array $parameters
    * @param String $method
    *
    * @return OfferScaleInterface
    */
    private function processDelete(OfferScaleInterface $offer_scale, array $parameters, $method = "PUT")
    {
        $this->om->remove($offer_scale);
        $this->om->flush($offer_scale);

        return null;
    }

    private function createOfferScale()
    {
        return new $this->entityClass();
    }
}