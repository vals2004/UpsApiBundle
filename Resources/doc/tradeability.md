## Tradeability Class

The Tradeability class allows you to get data for international shipments:
* Landed Costs (e.g. duties)
* Denied Party Screener
* Import Compliance
* Export License Detection

Note: only the Landed Costs API is currently implemented.

WARNING: Tradeability is only available through a SOAP API. Therefore you are required to have the [SOAP extension](http://php.net/manual/en/book.soap.php) installed on your system.

<a name="tradeability-class-example"></a>
### Example

```php

    // Build request
    $landedCostRequest = $this->getContainer()->get(''ups.tradeability);
    
    // Build shipment
    $shipment = new \Ups\Entity\Tradeability\Shipment;
    $shipment->setOriginCountryCode('NL');
    $shipment->setDestinationCountryCode('US');
    $shipment->setDestinationStateProvinceCode('TX');
    $shipment->setResultCurrencyCode('EUR');
    $shipment->setTariffCodeAlert(1);
    $shipment->setTransportationMode(\Ups\Entity\Tradeability\Shipment::TRANSPORT_MODE_AIR);
    $shipment->setTransactionReferenceId('1');
    
    // Build product
    $product = new \Ups\Entity\Tradeability\Product;
    $product->setProductName('Test');
    $tariffInfo = new \Ups\Entity\Tradeability\TariffInfo;
    $tariffInfo->setTariffCode('5109.90.80.00');
    $product->setTariffInfo($tariffInfo);
    $product->setProductCountryCodeOfOrigin('BD');
    $unitPrice = new \Ups\Entity\Tradeability\UnitPrice;
    $unitPrice->setMonetaryValue(250);
    $unitPrice->setCurrencyCode('EUR');
    $product->setUnitPrice($unitPrice);
    $weight = new Ups\Entity\Tradeability\Weight;
    $weight->setValue(0.83);
    $unitOfMeasurement = new \Ups\Entity\Tradeability\UnitOfMeasurement;
    $unitOfMeasurement->setCode('kg');
    $weight->setUnitOfMeasurement($unitOfMeasurement);
    $product->setWeight($weight);
    $quantity = new \Ups\Entity\Tradeability\Quantity;
    $quantity->setValue(5);
    $unitOfMeasurement = new \Ups\Entity\Tradeability\UnitOfMeasurement;
    $unitOfMeasurement->setCode(\Ups\Entity\Tradeability\UnitOfMeasurement::PROD_PIECES);
    $quantity->setUnitOfMeasurement($unitOfMeasurement);
    $product->setQuantity($quantity);
    $product->setTariffCodeAlert(1);
    
    // Add product to shipment
    $shipment->addProduct($product);
    
    // Query request
    $queryRequest = new \Ups\Entity\Tradeability\QueryRequest;
    $queryRequest->setShipment($shipment);
    $queryRequest->setSuppressQuestionIndicator(true);
    
    // Build
    $landedCostRequest->setQueryRequest($queryRequest);
    
    try {
        // Get the data
        $api = new Ups\Tradeability($accessKey, $userId, $password);
        $result = $api->getLandedCosts($landedCostRequest);
    
        var_dump($result);
    } catch (Exception $e) {
        var_dump($e);
    }
```

<a name="tradeability-class-parameters"></a>
### Parameters

For the Landed Cost call, parameters are:

 * `landedCostRequest` Mandatory. landedCostRequest object with request details, see example.