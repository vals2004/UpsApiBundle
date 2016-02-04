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

use Ups\Entity\RateRequest;
use Ups\RequestInterface;
use Ups\ResponseInterface;
use Ups\Rate;
use Ups\Entity\Exception;

class RateWrapper
{
    /**
     * @var \Ups\Rate
     */
    private $upsRate;

    /**
     * Shipping constructor.
     *
     * @param Rate $upsRate
     */
    public function __construct(Rate $upsRate)
    {
        $this->upsRate = $upsRate;
    }

    /**
     * @param $rateRequest
     *
     * @throws Exception
     *
     * @return RateRequest
     */
    public function shopRates($rateRequest)
    {
        $this->upsRate->shopRates($rateRequest);
    }

    /**
     * @param $rateRequest
     *
     * @throws Exception
     *
     * @return RateRequest
     */
    public function getRate($rateRequest)
    {
        return $this->upsRate->getRate($rateRequest);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->upsRate->getRequest();
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->upsRate->setRequest($request);

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->upsRate->getResponse();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return $this
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->upsRate->setResponse($response);

        return $this;
    }
}
