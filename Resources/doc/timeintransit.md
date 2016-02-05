## TimeInTransit Class

The TimeInTransit Class allow you to get all transit times using the UPS TimeInTransit API.

<a name="timeintransit-class-example"></a>
### Example

```php
    
    $timeInTransit = $this->getContainer()->get('ups.timeintransit');
    
    try {
        $request = new \Ups\Entity\TimeInTransitRequest;
    
        // Addresses
        $from = new \Ups\Entity\AddressArtifactFormat;
        $from->setPoliticalDivision3('Amsterdam');
        $from->setPostcodePrimaryLow('1000AA');
        $from->setCountryCode('NL');
        $request->setTransitFrom($from);
    
        $to = new \Ups\Entity\AddressArtifactFormat;
        $to->setPoliticalDivision3('Amsterdam');
        $to->setPostcodePrimaryLow('1000AA');
        $to->setCountryCode('NL');
        $request->setTransitTo($to);
    
        // Weight
        $shipmentWeight = new \Ups\Entity\ShipmentWeight;
        $shipmentWeight->setWeight($totalWeight);
        $unit = new \Ups\Entity\UnitOfMeasurement;
        $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_KGS);
        $shipmentWeight->setUnitOfMeasurement($unit);
        $request->setShipmentWeight($shipmentWeight);
    
        // Packages
        $request->setTotalPackagesInShipment(2);
    
        // InvoiceLines
        $invoiceLineTotal = new \Ups\Entity\InvoiceLineTotal;
        $invoiceLineTotal->setMonetaryValue(100.00);
        $invoiceLineTotal->setCurrencyCode('EUR');
        $request->setInvoiceLineTotal($invoiceLineTotal);
    
        // Pickup date
        $request->setPickupDate(new DateTime);
    
        // Get data
        $times = $timeInTransit->getTimeInTransit($request);
    
        foreach($times->ServiceSummary as $serviceSummary) {
            var_dump($serviceSummary);
        }
    
    } catch (Exception $e) {
        var_dump($e);
    }
```

<a name="timeintransit-class-parameters"></a>
### Parameters

 * `timeInTransitRequest` Mandatory. timeInTransitRequest Object with shipment details, see example above.