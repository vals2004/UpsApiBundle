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

use Ups\Entity\TimeInTransitRequest;
use Ups\RequestInterface;
use Ups\ResponseInterface;
use Ups\TimeInTransit;
use Ups\Entity\Exception;

class TimeInTransitWrapper
{
    /**
     * @var \Ups\TimeInTransit
     */
    private $upsTimeInTransit;

    /**
     * Shipping constructor.
     *
     * @param TimeInTransit $upsTimeInTransit
     */
    public function __construct(TimeInTransit $upsTimeInTransit)
    {
        $this->upsTimeInTransit = $upsTimeInTransit;
    }

    /**
     * @param TimeInTransitRequest $shipment
     *
     * @throws Exception
     *
     * @return TimeInTransitRequest
     */
    public function getTimeInTransit(TimeInTransitRequest $shipment)
    {
        return $this->upsTimeInTransit->getTimeInTransit($shipment);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->upsTimeInTransit->getRequest();
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->upsTimeInTransit->setRequest($request);

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->upsTimeInTransit->getResponse();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return $this
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->upsTimeInTransit->setResponse($response);

        return $this;
    }
}
