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

use Octante\UpsAPIBundle\Library\ShippingWrapper;

class ShippingTest extends \PHPUnit_Framework_TestCase
{
    private $shippingMock;

    public function setUp()
    {
        $this->shippingMock = $this->getMock('Ups\Shipping');
    }

    /**
     * when: confirmIsCalled
     * should: callUpsShippingConfirmMethod.
     */
    public function testShippingConfirmMethodIsCalled()
    {
        $validationString = 'validationString';
        $shipmentMock = $this->getMockBuilder('Ups\Entity\Shipment')
            ->disableOriginalConstructor()
            ->getMock();
        $labelSpecMock = $this->getMockBuilder('Ups\Entity\ShipmentRequestLabelSpecification')
            ->disableOriginalConstructor()
            ->getMock();
        $receiptSpecMock = $this->getMockBuilder('Ups\Entity\ShipmentRequestReceiptSpecification')
            ->disableOriginalConstructor()
            ->getMock();

        $this->shippingMock
            ->expects($this->once())
            ->method('confirm')
            ->with(
                $validationString,
                $shipmentMock,
                $labelSpecMock,
                $receiptSpecMock
            );

        $sut = new ShippingWrapper($this->shippingMock);

        $sut->confirm(
            'validationString',
            $shipmentMock,
            $labelSpecMock,
            $receiptSpecMock
        );
    }

    /**
     * when: acceptIsCalled
     * should: callUpsShippingAcceptMethod.
     */
    public function testShippingAcceptMethodIsCalled()
    {
        $shipmentDigestString = 'shippmentDigestString';
        $this->shippingMock
            ->expects($this->once())
            ->method('accept')
            ->with($shipmentDigestString);

        $sut = new ShippingWrapper($this->shippingMock);

        $sut->accept($shipmentDigestString);
    }

    /**
     * when: voidIsCalled
     * should: callUpsShippingVoidRequestMethod.
     */
    public function testShippingVoidMethodIsCalled()
    {
        $shipmentDataString = 'shippmentDataString';
        $this->shippingMock
            ->expects($this->once())
            ->method('void')
            ->with($shipmentDataString);

        $sut = new ShippingWrapper($this->shippingMock);

        $sut->void($shipmentDataString);
    }

    /**
     * when: recoverLabelIsCalled
     * should: callUpsShippingRecoverLabelRequestMethod.
     */
    public function testShippingRecoverLabelMethodIsCalled()
    {
        $shipmentDataString = 'shipmentDataString';
        $this->shippingMock
            ->expects($this->once())
            ->method('recoverLabel')
            ->with($shipmentDataString);

        $sut = new ShippingWrapper($this->shippingMock);

        $sut->recoverLabel($shipmentDataString);
    }
}
