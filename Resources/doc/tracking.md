## Tracking Class

The Tracking Class allow you to track a shipment using the UPS Tracking API.

<a name="tracking-class-example"></a>
### Example using Tracking Number / Mail Innovations tracking number

```php

    $tracking = $this->getContainer()->get('ups.tracking');
    
    try {
        $shipment = $tracking->track('TRACKING NUMBER');
    
        foreach($shipment->Package->Activity as $activity) {
            var_dump($activity);
        }
    
    } catch (Exception $e) {
        var_dump($e);
    }
```

<a name="tracking-class-parameters"></a>
### Parameters

Tracking parameters are:

 * `trackingNumber` The package’s tracking number.
 * `requestOption` Optional processing. For Mail Innovations the only valid options are Last Activity and All activity.

<a name="tracking-class-example"></a>
### Example using Reference Number

```php

    $tracking = $this->getContainer()->get('ups.tracking');
    
    try {
        $shipment = $tracking->trackByReference('REFERENCE NUMBER');
    
        foreach($shipment->Package->Activity as $activity) {
            var_dump($activity);
        }
    
    } catch (Exception $e) {
        var_dump($e);
    }
```
<a name="tracking-class-parameters"></a>
### Parameters

Tracking parameters are:

 * `referenceNumber` The ability to track any UPS package or shipment by reference number. Reference numbers can be a purchase order number, job number, etc. Reference Number is supplied when generating a shipment.
 * `requestOption` Optional processing. For Mail Innovations the only valid options are Last Activity and All activity.