## Shipping Class.

The Shipping Class allow you to ship a package using the UPS Tracking API. Shipping needs to steps, first you need to send
a confirm request and second an accept request.

<a name="tracking-class-example"></a>
### Example using Shipping class

``` php
<?php

    $shipping = $this->getContainer()->get('ups.shipping);
     
    try {

        $shipment = new Shipment();         
        
        $shipper = $shipment->getShipper();
        $shipper->setShipperNumber($userid);
        $shipper->setName('COMPANY_NAME');
        $shipper->setAttentionName('COMPANY_NAME');
        $shipper->setPhoneNumber('0123456789');
        $shipperAddress = $shipment->getShipper()->getAddress();
        $shipperAddress->setPostalCode('POSTALCODE');
        $shipperAddress->setAddressLine1('BUSINESS ADDRESS 1');
        $shipperAddress->setAddressLine2('BUSINESS ADDRESS 2');
        $shipperAddress->setCity('CITY');
        $shipperAddress->setCountryCode('DE');          
        
        $address = new Address();
        $address->setPostalCode('POSTALCODE');
        $address->setAddressLine1('BUSINESS ADDRESS 1');
        //$address->setAddressLine2('BUSINESS ADDRESS 2');
        $address->setCity('CITY');
        $address->setCountryCode('DE');
        $shipFrom = new ShipFrom();
        $shipFrom->setAddress($address);
        $shipFrom->setCompanyName('COMPANY_NAME');
        $shipment->setShipFrom($shipFrom);
        $ship = $shipment->getShipFrom();
        $ship->CompanyName = 'COMPANY_NAME';                
        
        $shipTo = $shipment->getShipTo();
        $shipTo->setAttentionName('FIRSTNAME LASTNAME');
        $shipTo->setReceivingAddressName('FIRSTNAME LASTNAME');
        $shipTo->setPhoneNumber('999999999');
        $shipTo->setEmailAddress('EMAIL@DOMAIM.COM');
        $shipTo->setCompanyName('COMPANY_NAME');
        $shipToAddress = $shipTo->getAddress();
        $shipToAddress->setPostalCode('POSTALCODE');
        $shipToAddress->setAddressLine1('ADDRESS 1');
        //$shipToAddress->setAddressLine2('ADDRESS 2');
        $shipToAddress->setCity('CITY');
        $shipToAddress->setCountryCode('FR');
        $shipment->setShipTo($shipTo);
        
        //Add package
        
        $unitofweight = new UnitOfMeasurement;
        $unitofweight->setCode(UnitOfMeasurement::UOM_KGS);
        
        $package = new Package();
        $package->getPackagingType()->setCode(PackagingType::PT_PACKAGE);
        $package->getPackageWeight()->setWeight('10');
        $package->getPackageWeight()->setUnitOfMeasurement($unitofweight);          
        
        $dimensions = new Dimensions();
        $dimensions->setHeight(20);
        $dimensions->setWidth(21);
        $dimensions->setLength(33);
        
        $unit = new UnitOfMeasurement;
        $unit->setCode(UnitOfMeasurement::UOM_CM);          
        
        $dimensions->setUnitOfMeasurement($unit);
        $package->setDimensions($dimensions);
        $shipment->addPackage($package);
        
        $referencenumber=new ReferenceNumber;
        //$referencenumber->setCode('RZ');
        $referencenumber->setValue('MYREFNUMBER_1');
        $shipment->setReferenceNumber($referencenumber);
        
        $service= new Service();            
        $service->setCode(Service::S_STANDARD);         
        $shipment->setService($service);
        
        /*$returnservice = new ReturnService;
        $returnservice->setCode(ReturnService::PRINT_RETURN_LABEL_PRL);
        $shipment->setReturnService($returnservice);*/
        
        $billshipper= new BillShipper();
        $billshipper->setAccountNumber($userid);
        $prepaid=new Prepaid(); 
        $prepaid->setBillShipper($billshipper);
        
        $paymentInformation = new PaymentInformation;
        $paymentInformation->setPrepaid($prepaid);
        
        $shipment->setPaymentInformation($paymentInformation);
        
        //This will create UPS shipment         
        $result = $shipping->confirm('nonvalidate', $shipment);
        
        $shipment_charges = $result->ShipmentCharges->TotalCharges->MonetaryValue;
        $shipment_weight = $result->BillingWeight->Weight." ".$result->BillingWeight->UnitOfMeasurement->Code;
        $tracking_number = $result->ShipmentIdentificationNumber;
        $shipment_digest = $result->ShipmentDigest; //can be used to print labels
        
        $accept = $shipping->accept($shipment_digest);
            
        $tracking_number = $accept->PackageResults->TrackingNumber;
        $imageformat = $accept->PackageResults->LabelImage->LabelImageFormat->Code;
            
        $base64image = $accept->PackageResults->LabelImage->GraphicImage;
        
        $image = base64_decode($base64image);
            
        $response = Response::make($image,200);
            
        // Set the mime type for the response.
        // We now use the Image class for this also.
        $response->header('content-type', 'image/gif');
        
        return $response;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
```

<a name="tracking-class-parameters"></a>
### Parameters

Confirm parameters are:

 * `validation` A UPS_Shipping::REQ_* constant (or null)
 * `shipment` Shipment data container.
 * `labelSpec` (Optional) LabelSpecification data
 * `receiptSpec` (Optional) ShipmentRequestReceiptSpecification data.
 
 Accept parameters are:
 
 * `shipmentDigest` The UPS Shipment Digest received from a ShipConfirm request.