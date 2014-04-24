<?php

namespace CB\APIBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Serializer\Serializer;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use CB\APIBundle\Exception\InvalidFormException;
use CB\APIBundle\Form\OfferScaleType;
use CB\APIBundle\Model\OfferScaleInterface;

class OfferScaleController extends FOSRestController
{
	/**
     * List all offer scales.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing offer_scales.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many offer_scales to return.")
     *
     * @Annotations\View(
     *  templateVar="offer_scales"
     * )
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getOffer_scalesAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');

        return $this->container->get('cb_api.offer_scale.handler')->all($limit, $offset);
    }

	/**
	 * Get single OfferScale.
	 *
	 * @ApiDoc(
	 * resource = true,
	 * description = "Gets an OfferScale for a given id",
	 * output = "CB\APIBundle\Entity\OfferScale",
	 * statusCodes = {
	 * 200 = "Returned when successful",
	 * 404 = "Returned when the offer_scale is not found"
	 * }
	 * )
	 *
	 * @Annotations\View(templateVar="offer_scale")
	 *
	 * @param int $id the offer_scale id
	 *
	 * @return array
	 *
	 * @throws NotFoundHttpException when offer_scale not exist
	*/
	public function getOffer_scaleAction($id)
	{
        $offer_scale = $this->getOr404($id);

        return $offer_scale;
	}

    /**
	 * Presents the form to use to create a new offer scale.
	 *
	 * @ApiDoc(
	 * resource = true,
	 * statusCodes = {
	 * 200 = "Returned when successful"
	 * }
	 * )
	 *
	 * @Annotations\View(
	 * templateVar = "form"
	 * )
	 *
	 * @return FormTypeInterface
	*/
    public function newOffer_scaleAction()
    {
        return $this->createForm(new OfferScaleType());
    }

    /**
	 * Create an OfferScale from the submitted data.
	 *
	 * @ApiDoc(
	 * resource = true,
	 * description = "Creates a new offer_scale from the submitted data.",
	 * input = "CB\APIBundle\Form\OfferScaleType",
	 * statusCodes = {
	 * 200 = "Returned when successful",
	 * 400 = "Returned when the form has errors"
	 * }
	 * )
	 *
	 * @Annotations\View(
	 * template = "CBAPIBundle:OfferScale:newOffer_scale.html.twig",
	 * statusCode = Codes::HTTP_BAD_REQUEST,
	 * templateVar = "form"
	 * )
	 *
	 * @param Request $request the request object
	 *
	 * @return FormTypeInterface|View
	*/
    public function postOffer_scaleAction(Request $request)
    {
        try {
        	$form = new OfferScaleType();
            $newOfferScale = $this->container->get('cb_api.offer_scale.handler')->post(
                $request->request->all()
            );
            // $newOfferScale = $this->container->get('cb_api.offer_scale.handler')->post(
            // 		$request->request->get($form->getName())
            // 	);

            $routeOptions = array(
                'id' => $newOfferScale->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_offer_scale', $routeOptions, Codes::HTTP_CREATED);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
	 * Update existing offer_scale from the submitted data or create a new offer_scale at a specific location.
	 *
	 * @ApiDoc(
	 *   resource = true,
	 *   input = "CB\APIBundle\Form\OfferScaleType",
	 *   statusCodes = {
	 *     201 = "Returned when the OfferScale is created",
	 *     204 = "Returned when successful",
	 *     400 = "Returned when the form has errors"
	 *   }
	 * )
	 *
	 * @Annotations\View(
	 *  template = "CBAPIBundle:OfferScale:editOffer_scale.html.twig",
	 *  templateVar = "form"
	 * )
	 *
	 * @param Request $request the request object
	 * @param int     $id      the offer_scale id
	 *
	 * @return FormTypeInterface|View
	 *
	 * @throws NotFoundHttpException when offer_scale not exist
	 */
	public function putOffer_scaleAction(Request $request, $id)
	{
	    try {
	        if (!($offer_scale = $this->container->get('cb_api.offer_scale.handler')->get($id))) {
	            $statusCode = Codes::HTTP_CREATED;
	            $offer_scale = $this->container->get('cb_api.offer_scale.handler')->post(
	                $request->request->all()
	            );
	        } else {
	            $statusCode = Codes::HTTP_NO_CONTENT;
	            $offer_scale = $this->container->get('cb_api.offer_scale.handler')->put(
	                $offer_scale,
	                $request->request->all()
	            );
	        }

	        $routeOptions = array(
	            'id' => $offer_scale->getId(),
	            '_format' => $request->get('_format')
	        );

	        return $this->routeRedirectView('api_1_get_offer_scale', $routeOptions, $statusCode);

	    } catch (InvalidFormException $exception) {

	        return $exception->getForm();
	    }
	}

    /**
	 * Update existing offer_scale from the submitted data or create a new  offer_scale at a specific location.
	 *
	 * @ApiDoc(
	 * resource = true,
	 * input = "CB\APIBundle\Form\OfferScaleType",
	 * statusCodes = {
	 * 204 = "Returned when successful",
	 * 400 = "Returned when the form has errors"
	 * }
	 * )
	 *
	 * @Annotations\View(
	 * template = "CBAPIBundle:OfferScale:editPage.html.twig",
	 * templateVar = "form"
	 * )
	 *
	 * @param Request $request the request object
	 * @param int $id the offer_scale id
	 *
	 * @return FormTypeInterface|View
	 *
	 * @throws NotFoundHttpException when offer_scale not exist
	*/
    public function patchOffer_scaleAction(Request $request, $id)
    {
        try {
            $offer_scale = $this->container->get('cb_api.offer_scale.handler')->patch(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => $offer_scale->getId(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_offer_scale', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
	 * Delete existing offer_scale from the submitted data.
	 *
	 * @ApiDoc(
	 * resource = true,
	 * input = "CB\APIBundle\Form\OfferScaleType",
	 * statusCodes = {
	 * 204 = "Returned when successful",
	 * 400 = "Returned when the form has errors"
	 * }
	 * )
	 *
	 * @Annotations\View(
	 * template = "CBAPIBundle:OfferScale:editPage.html.twig",
	 * templateVar = "form"
	 * )
	 *
	 * @param Request $request the request object
	 * @param int $id the offer_scale id
	 *
	 * @return FormTypeInterface|View
	 *
	 * @throws NotFoundHttpException when offer_scale not exist
	*/
    public function deleteOffer_scaleAction(Request $request, $id)
    {
        try {
            $offer_scale = $this->container->get('cb_api.offer_scale.handler')->remove(
                $this->getOr404($id),
                $request->request->all()
            );

            $routeOptions = array(
                'id' => 'null',
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_1_get_offer_scale', $routeOptions, Codes::HTTP_NO_CONTENT);

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

	/**
	 * Fetch a Page or throw an 404 Exception.
	 *
	 * @param mixed $id
	 *
	 * @return PageInterface
	 *
	 * @throws NotFoundHttpException
	*/
    protected function getOr404($id)
    {
        if (!($offer_scale = $this->container->get('cb_api.offer_scale.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $offer_scale;
    }
    
    public function userAction(Request $request)
    {

    	$usn = $request->get('username');

		$em = $this->getDoctrine()
		    ->getRepository('CBAPIBundle:User');
    	$user = $em->findOneByUsername($usn);

        // echo json_encode($user);

        // $user = $this->container->get('security.context')->getToken()->getUser();
        if($user) {
            return new JsonResponse(array(
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'role' => $user->getRoles()
            ));
        }

        return new JsonResponse(array(
            'message' => 'User is not identified'
        ));
    }

}