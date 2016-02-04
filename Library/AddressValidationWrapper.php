<?php

namespace Octante\UpsAPIBundle\Library;

/*
 * This file is part of the UpsAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Ups\AddressValidation;
use Ups\RequestInterface;
use Ups\ResponseInterface;
use Ups\Entity\Exception;

class AddressValidationWrapper
{
    /**
     * @var \Ups\AddressValidation
     */
    private $upsAddressValidation;

    /**
     * Shipping constructor.
     *
     * @param AddressValidation $upsAddressValidation
     */
    public function __construct(AddressValidation $upsAddressValidation)
    {
        $this->upsAddressValidation = $upsAddressValidation;
    }

    /**
     * Get address suggestions from UPS.
     *
     * @param $address
     * @param int $requestOption
     * @param int $maxSuggestion
     *
     * @throws Exception
     *
     * @return \StdClass
     */
    public function validate(
        $address,
        $requestOption = AddressValidation::REQUEST_OPTION_ADDRESS_VALIDATION,
        $maxSuggestion = 15
    ) {
        $this->upsAddressValidation->validate($address, $requestOption, $maxSuggestion);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this
            ->upsAddressValidation
            ->getRequest();
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->upsAddressValidation->setRequest($request);

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->upsAddressValidation->getResponse();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return $this
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->upsAddressValidation->setResponse($response);

        return $this;
    }
}
