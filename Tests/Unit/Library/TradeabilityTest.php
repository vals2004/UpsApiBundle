<?php

namespace Octante\UpsAPIBundle\Tests\Unit\Library;

/*
 * This file is part of the UpsAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Octante\UpsAPIBundle\Library\TradeabilityWrapper;

class TradeabilityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    private $tradeabilityMock;

    public function setUp()
    {
        $this->tradeabilityMock = $this->getMock('Ups\Tradeability');
    }

    /**
     * when: getLandedCostsIsCalled
     * should: callUpsTradeabilityGetLandedCostsMethod.
     */
    public function testTradeabilityGetLandedCostMethodIsCalled()
    {
        $landedCostRequestMock = $this->getMock('Ups\Entity\Tradeability\LandedCostRequest');
        $this->tradeabilityMock
            ->expects($this->once())
            ->method('getLandedCosts')
            ->with($landedCostRequestMock);

        $sut = new TradeabilityWrapper($this->tradeabilityMock);

        $sut->getLandedCosts($landedCostRequestMock);
    }

    /**
     * when: getRequestIsCalled
     * should: callUpsTradeabilityGetRequestMethod.
     */
    public function testTradeabilityGetRequestMethodIsCalled()
    {
        $requestMock = $this->getMock('Ups\Request');
        $this
            ->tradeabilityMock
            ->method('getRequest')
            ->willReturn($requestMock);

        $sut = new TradeabilityWrapper($this->tradeabilityMock);
        $sut->setRequest($requestMock);
        $request = $sut->getRequest();
        $this->assertInstanceOf('Ups\Request', $request);
    }
}
