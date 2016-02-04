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

use Octante\UpsAPIBundle\Library\LocatorWrapper;
use Ups\Locator;

class LocatorTest extends \PHPUnit_Framework_TestCase
{
    private $locatorMock;

    public function setUp()
    {
        $this->locatorMock = $this->getMock('Ups\Locator');
    }

    /**
     * when: getLocationsIsCalled
     * should: callUpsLocatorGetLocationsMethod.
     */
    public function testUpsLocatorGetLocationMethodIsCalled()
    {
        $locatorRequestMock = $this->getMock('Ups\Entity\LocatorRequest');
        $locatorOption = Locator::OPTION_UPS_ACCESS_POINT_LOCATIONS;
        $this->locatorMock
            ->expects($this->once())
            ->method('getLocations')
            ->with(
                $locatorRequestMock,
                $locatorOption
            );

        $sut = new LocatorWrapper($this->locatorMock);

        $sut->getLocations(
            $locatorRequestMock,
            $locatorOption
        );
    }

    /**
     * when: getRequestIsCalled
     * should: callUpsLocatorGetRequestMethod.
     */
    public function testUpsLocatorGetRequestMethodIsCalled()
    {
        $requestMock = $this->getMock('Ups\Request');
        $this
            ->locatorMock
            ->method('getRequest')
            ->willReturn($requestMock);

        $sut = new LocatorWrapper($this->locatorMock);
        $sut->setRequest($requestMock);
        $request = $sut->getRequest();
        $this->assertInstanceOf('Ups\Request', $request);
    }

    /**
     * when: getResponseIsCalled
     * should: callUpsLocatorGetResponseMethod.
     */
    public function testUpsLocatorGetResponseMethodIsCalled()
    {
        $responseMock = $this->getMock('Ups\Response');
        $this
            ->locatorMock
            ->method('getResponse')
            ->willReturn($responseMock);

        $sut = new LocatorWrapper($this->locatorMock);
        $sut->setResponse($responseMock);
        $response = $sut->getResponse();
        $this->assertInstanceOf('Ups\Response', $response);
    }
}
