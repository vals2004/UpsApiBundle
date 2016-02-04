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

use Octante\UpsAPIBundle\Library\RateWrapper;

class RateTest extends \PHPUnit_Framework_TestCase
{
    private $rateMock;

    public function setUp()
    {
        $this->rateMock = $this->getMock('Ups\Rate');
    }

    /**
     * when: shopRatesIsCalled
     * should: callUpsRateShopRatesMethod.
     */
    public function testRateShopRatesMethodIsCalled()
    {
        $rateRequest = $this->getMock('Ups\Entity\RateRequest');
        $this->rateMock
            ->expects($this->once())
            ->method('shopRates')
            ->with($rateRequest);

        $sut = new RateWrapper($this->rateMock);

        $sut->shopRates($rateRequest);
    }

    /**
     * when: getRateIsCalled
     * should: callUpsRateGetRateMethod.
     */
    public function testRateGetRateMethodIsCalled()
    {
        $shipmentMock = $this->getMock('Ups\Entity\Shipment');
        $rateRequestMock = $this->getMock('Ups\Entity\RateRequest');
        $this->rateMock
            ->expects($this->once())
            ->method('getRate')
            ->willReturn($rateRequestMock);

        $sut = new RateWrapper($this->rateMock);

        $rateRequest = $sut->getRate($shipmentMock);
        $this->assertEquals($rateRequestMock, $rateRequest);
    }

    /**
     * when: getRequestIsCalled
     * should: callUpsRateGetRequestMethod.
     */
    public function testRateGetRequestMethodIsCalled()
    {
        $requestMock = $this->getMock('Ups\Request');
        $this
            ->rateMock
            ->method('getRequest')
            ->willReturn($requestMock);

        $sut = new RateWrapper($this->rateMock);
        $sut->setRequest($requestMock);
        $request = $sut->getRequest();
        $this->assertInstanceOf('Ups\Request', $request);
    }

    /**
     * when: getResponseIsCalled
     * should: callUpsRateGetResponseMethod.
     */
    public function testRateGetResponseMethodIsCalled()
    {
        $responseMock = $this->getMock('Ups\Response');
        $this
            ->rateMock
            ->method('getResponse')
            ->willReturn($responseMock);

        $sut = new RateWrapper($this->rateMock);
        $sut->setResponse($responseMock);
        $response = $sut->getResponse();
        $this->assertInstanceOf('Ups\Response', $response);
    }
}
