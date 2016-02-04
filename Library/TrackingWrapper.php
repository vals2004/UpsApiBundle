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

use Ups\RequestInterface;
use Ups\ResponseInterface;
use Ups\Tracking;
use Ups\Entity\Exception;

class TrackingWrapper
{
    /**
     * @var \Ups\Tracking
     */
    private $upsTracking;

    /**
     * Shipping constructor.
     *
     * @param Tracking $upsTracking
     */
    public function __construct(Tracking $upsTracking)
    {
        $this->upsTracking = $upsTracking;
    }

    /**
     * Get package tracking information.
     *
     * @param string $trackingNumber The package's tracking number.
     * @param string $requestOption  Optional processing. For Mail Innovations the only valid options are Last Activity and All activity.
     *
     * @throws Exception
     *
     * @return \StdClass
     */
    public function track($trackingNumber, $requestOption = 'activity')
    {
        $this->upsTracking->track($trackingNumber, $requestOption);
    }

    /**
     * Get package tracking information.
     *
     * @param string $referenceNumber Reference numbers can be a purchase order number, job number, etc. Reference number can be added when creating a shipment.
     *
     * @throws Exception
     *
     * @return \StdClass
     */
    public function trackByReference($referenceNumber, $requestOption = 'activity')
    {
        $this->upsTracking->trackByReference($referenceNumber, $requestOption);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->upsTracking->getRequest();
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->upsTracking->setRequest($request);

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->upsTracking->getResponse();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return $this
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->upsTracking->setResponse($response);

        return $this;
    }
}
