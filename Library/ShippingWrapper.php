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

use Ups\Entity\Shipment;
use Ups\Entity\ShipmentRequestLabelSpecification;
use Ups\Entity\ShipmentRequestReceiptSpecification;

class ShippingWrapper
{
    /**
     * @var \Ups\Shipping
     */
    private $upsShipping;

    /**
     * Shipping constructor.
     *
     * @param \Ups\Shipping $upsShipping
     */
    public function __construct(\Ups\Shipping $upsShipping)
    {
        $this->upsShipping = $upsShipping;
    }

    /**
     * @param $validation
     * @param Shipment                                 $shipment
     * @param ShipmentRequestLabelSpecification|null   $labelSpec
     * @param ShipmentRequestReceiptSpecification|null $receiptSpec
     */
    public function confirm(
        $validation,
        Shipment $shipment,
        ShipmentRequestLabelSpecification $labelSpec = null,
        ShipmentRequestReceiptSpecification $receiptSpec = null
    ) {
        $this->upsShipping->confirm(
            $validation,
            $shipment,
            $labelSpec,
            $receiptSpec
        );
    }

    /**
     * @param $shipmentDigest
     */
    public function accept($shipmentDigest)
    {
        $this->upsShipping->accept($shipmentDigest);
    }

    /**
     * @param $shipmentData
     */
    public function void($shipmentData)
    {
        $this->upsShipping->void($shipmentData);
    }

    /**
     * @param $trackingData
     * @param null $labelSpecification
     * @param null $labelDelivery
     * @param null $translate
     */
    public function recoverLabel(
        $trackingData,
        $labelSpecification = null,
        $labelDelivery = null,
        $translate = null
    ) {
        $this->upsShipping->recoverLabel(
            $trackingData,
            $labelSpecification,
            $labelDelivery,
            $translate
        );
    }
}
