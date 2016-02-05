## Rate Class

The Rate Class allow you to get shipment rates using the UPS Rate API.

<a name="rate-class-example"></a>
### Example

```php

    $rate = $this->getContainer()->get('ups.rate');
    
    try {
        $shipment = new \Ups\Entity\Shipment();
    
        $shipperAddress = $shipment->getShipper()->getAddress();
        $shipperAddress->setPostalCode('99205');
    
        $address = new \Ups\Entity\Address();
        $address->setPostalCode('99205');
        $shipFrom = new \Ups\Entity\ShipFrom();
        $shipFrom->setAddress($address);
    
        $shipment->setShipFrom($shipFrom);
    
        $shipTo = $shipment->getShipTo();
        $shipTo->setCompanyName('Test Ship To');
        $shipToAddress = $shipTo->getAddress();
        $shipToAddress->setPostalCode('99205');
    
        $package = new \Ups\Entity\Package();
        $package->getPackagingType()->setCode(\Ups\Entity\PackagingType::PT_PACKAGE);
        $package->getPackageWeight()->setWeight(10);
    
        $dimensions = new \Ups\Entity\Dimensions();
        $dimensions->setHeight(10);
        $dimensions->setWidth(10);
        $dimensions->setLength(10);
    
        $unit = new \Ups\Entity\UnitOfMeasurement;
        $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_IN);
    
        $dimensions->setUnitOfMeasurement($unit);
        $package->setDimensions($dimensions);
    
        $shipment->addPackage($package);
    
        var_dump($rate->getRate($shipment));
    } catch (Exception $e) {
        var_dump($e);
    }
```
<a name="rate-class-parameters"></a>
### Parameters

 * `rateRequest` Mandatory. rateRequest Object with shipment details

This Rate class is not finished yet! Parameter should be added when it will be finished.