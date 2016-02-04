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

use Ups\Entity\LocatorRequest;
use Ups\RequestInterface;
use Ups\ResponseInterface;
use Ups\Locator;

class LocatorWrapper
{
    /**
     * @var \Ups\Locator
     */
    private $upsLocator;

    /**
     * Shipping constructor.
     *
     * @param Locator $upsLocator
     */
    public function __construct(Locator $upsLocator)
    {
        $this->upsLocator = $upsLocator;
    }

    /**
     * @param LocatorRequest $request
     * @param int            $requestOption
     *
     * @return LocatorRequest
     */
    public function getLocations(LocatorRequest $request, $requestOption = Locator::OPTION_UPS_ACCESS_POINT_LOCATIONS)
    {
        return $this->upsLocator->getLocations($request, $requestOption);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->upsLocator->getRequest();
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->upsLocator->setRequest($request);

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->upsLocator->getResponse();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return $this
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->upsLocator->setResponse($response);

        return $this;
    }
}
