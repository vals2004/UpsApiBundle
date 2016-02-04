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

use Octante\UpsAPIBundle\Library\TrackingWrapper;

class TrackingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    private $trackingMock;

    public function setUp()
    {
        $this->trackingMock = $this->getMock('Ups\Tracking');
    }

    /**
     * when: trackIsCalled
     * should: callUpsTrackingTrackMethod.
     */
    public function testTrackingGetTrackMethodIsCalled()
    {
        $trackingNumber = 'tracking Number';
        $requestOption = 'request Option';
        $this->trackingMock
            ->expects($this->once())
            ->method('track')
            ->with(
                $trackingNumber,
                $requestOption
            );

        $sut = new TrackingWrapper($this->trackingMock);

        $sut->track(
            $trackingNumber,
            $requestOption
        );
    }

    /**
     * when: trackByReferenceIsCalled
     * should: callUpsTrackingTrackByReferenceMethod.
     */
    public function testTrackingGetTrackByReferenceMethodIsCalled()
    {
        $referenceNumber = 'reference Number';
        $requestOption = 'request Option';
        $this->trackingMock
            ->expects($this->once())
            ->method('track')
            ->with(
                $referenceNumber,
                $requestOption
            );

        $sut = new TrackingWrapper($this->trackingMock);

        $sut->track(
            $referenceNumber,
            $requestOption
        );
    }

    /**
     * when: getRequestIsCalled
     * should: callUpsTrackingGetRequestMethod.
     */
    public function testTrackingGetGetRequestMethodIsCalled()
    {
        $requestMock = $this->getMock('Ups\Request');
        $this
            ->trackingMock
            ->method('getRequest')
            ->willReturn($requestMock);

        $sut = new TrackingWrapper($this->trackingMock);
        $sut->setRequest($requestMock);
        $request = $sut->getRequest();
        $this->assertInstanceOf('Ups\Request', $request);
    }

    /**
     * when: getResponseIsCalled
     * should: callUpsTrackingGetResponseMethod.
     */
    public function testTrackingGetResponseMethodIsCalled()
    {
        $responseMock = $this->getMock('Ups\Response');
        $this
            ->trackingMock
            ->method('getResponse')
            ->willReturn($responseMock);

        $sut = new TrackingWrapper($this->trackingMock);
        $sut->setResponse($responseMock);
        $response = $sut->getResponse();
        $this->assertInstanceOf('Ups\Response', $response);
    }
}
