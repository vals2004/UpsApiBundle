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

use Octante\UpsAPIBundle\Library\QuantumViewWrapper;

class QuantumViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    private $quantumViewMock;

    public function setUp()
    {
        $this->quantumViewMock = $this->getMock('Ups\QuantumView');
    }

    /**
     * when: getSubscriptionIsCalled
     * should: callUpsQuantumViewGetSubscriptionMethod.
     */
    public function testQuantumViewGetSubscriptionMethodIsCalled()
    {
        $name = 'name';
        $beginDateTime = 'begin date time';
        $endDateTime = 'end date time';
        $fileName = 'filename';
        $bookmark = 'bookmark';

        $this
            ->quantumViewMock
            ->expects($this->once())
            ->method('getSubscription')
            ->with(
                $name,
                $beginDateTime,
                $endDateTime,
                $fileName,
                $bookmark
            );

        $sut = new QuantumViewWrapper($this->quantumViewMock);

        $sut->getSubscription(
            $name,
            $beginDateTime,
            $endDateTime,
            $fileName,
            $bookmark
        );
    }

    /**
     * when: getBookmarkIsCalled
     * should: callUpsQuantumViewGetBookmarkMethod.
     */
    public function testQuantumViewGetBookmarkMethodIsCalled()
    {
        $sut = new QuantumViewWrapper($this->quantumViewMock);

        $this
            ->quantumViewMock
            ->expects($this->once())
            ->method('getBookmark');

        $sut->getBookmark();
    }

    /**
     * when: hasBookmarkIsCalled
     * should: callUpsQuantumViewHasBookmarkMethod.
     */
    public function testQuantumViewHasBookmarkMethodIsCalled()
    {
        $sut = new QuantumViewWrapper($this->quantumViewMock);

        $this
            ->quantumViewMock
            ->expects($this->once())
            ->method('hasBookmark');

        $sut->hasBookmark();
    }

    /**
     * when: setBookmarkIsCalled
     * should: callUpsQuantumViewSetBookmarkMethod.
     */
    public function testQuantumViewSetBookmarkMethodIsCalled()
    {
        $sut = new QuantumViewWrapper($this->quantumViewMock);
        $bookmarkMock = 'bookmark name';

        $this
            ->quantumViewMock
            ->expects($this->once())
            ->method('setBookmark')
            ->with($bookmarkMock);

        $sut->setBookmark($bookmarkMock);
    }

    /**
     * when: getRequestIsCalled
     * should: callUpsQuantumViewGetRequestMethod.
     */
    public function testQuantumViewGetRequestMethodIsCalled()
    {
        $requestMock = $this->getMock('Ups\Request');
        $this
            ->quantumViewMock
            ->method('getRequest')
            ->willReturn($requestMock);

        $sut = new QuantumViewWrapper($this->quantumViewMock);
        $sut->setRequest($requestMock);
        $request = $sut->getRequest();
        $this->assertInstanceOf('Ups\Request', $request);
    }

    /**
     * when: getResponseIsCalled
     * should: callUpsGetResponseMethod.
     */
    public function testQuantumViewGetResponseMethodIsCalled()
    {
        $responseMock = $this->getMock('Ups\Response');
        $this
            ->quantumViewMock
            ->method('getResponse')
            ->willReturn($responseMock);

        $sut = new QuantumViewWrapper($this->quantumViewMock);
        $sut->setResponse($responseMock);
        $response = $sut->getResponse();
        $this->assertInstanceOf('Ups\Response', $response);
    }
}
