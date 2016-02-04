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

use Octante\UpsAPIBundle\Library\TimeInTransitWrapper;

class TimeInTransitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    private $timeInTransitMock;

    public function setUp()
    {
        $this->timeInTransitMock = $this->getMock('Ups\TimeInTransit');
    }

    /**
     * when: getTimeInTransitIsCalled
     * should: callUpsTimeInTransitGetTimeInTransitMethod.
     */
    public function testTimeInTransitGetTimeInTransitMethodIsCalled()
    {
        $timeInTransitRequestMock = $this->getMock('Ups\Entity\TimeInTransitRequest');
        $this->timeInTransitMock
            ->expects($this->once())
            ->method('getTimeInTransit')
            ->with($timeInTransitRequestMock);

        $sut = new TimeInTransitWrapper($this->timeInTransitMock);

        $sut->getTimeInTransit($timeInTransitRequestMock);
    }

    /**
     * when: getRequestIsCalled
     * should: callUpsTimeInTransitGetRequestMethod.
     */
    public function testTimeInTransitGetRequestMethodIsCalled()
    {
        $requestMock = $this->getMock('Ups\Request');
        $this
            ->timeInTransitMock
            ->method('getRequest')
            ->willReturn($requestMock);

        $sut = new TimeInTransitWrapper($this->timeInTransitMock);
        $sut->setRequest($requestMock);
        $request = $sut->getRequest();
        $this->assertInstanceOf('Ups\Request', $request);
    }

    /**
     * when: getResponseIsCalled
     * should: callUpsTimeInTransitGetResponseMethod.
     */
    public function testTimeInTransitGetResponseMethodIsCalled()
    {
        $responseMock = $this->getMock('Ups\Response');
        $this
            ->timeInTransitMock
            ->method('getResponse')
            ->willReturn($responseMock);

        $sut = new TimeInTransitWrapper($this->timeInTransitMock);
        $sut->setResponse($responseMock);
        $response = $sut->getResponse();
        $this->assertInstanceOf('Ups\Response', $response);
    }
}
