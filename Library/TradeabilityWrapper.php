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

use SimpleXMLElement;
use Ups\Entity\Tradeability\LandedCostRequest;
use Ups\RequestInterface;
use Ups\Tradeability;

class TradeabilityWrapper
{
    /**
     * @var \Ups\Tradeability
     */
    private $upsTradeability;

    /**
     * Shipping constructor.
     *
     * @param Tradeability $upsTradeability
     */
    public function __construct(Tradeability $upsTradeability)
    {
        $this->upsTradeability = $upsTradeability;
    }
    /**
     * @param LandedCostRequest $request
     *
     * @return SimpleXmlElement
     *
     * @throws \Exception
     */
    public function getLandedCosts(LandedCostRequest $request)
    {
        $this->upsTradeability->getLandedCosts($request);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->upsTradeability->getRequest();
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->upsTradeability->setRequest($request);

        return $this;
    }
}
