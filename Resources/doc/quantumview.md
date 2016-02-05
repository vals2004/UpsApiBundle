## QuantumView Class

The QuantumView Class allow you to request a Quantum View Data subscription.

<a name="quantumview-class-example"></a>
### Example

```php
    
    $quantumView = $this->getContainer()->get('ups.quantumview');
    
    try {
        // Get the subscription for all events for the last hour
        $events = $quantumView->getSubscription(null, (time() - 3600));
    
        foreach($events as $event) {
            // Your code here
            echo $event->Type;
        }
    
    } catch (Exception $e) {
        var_dump($e);
    }
```

<a name="quantumview-class-parameters"></a>
### Parameters

QuantumView parameters are:

 * `name` Name of subscription requested by user. If _null_, all events will be returned.
 * `beginDateTime` Beginning date time for the retrieval criteria of the subscriptions. Format: Y-m-d H:i:s or Unix timestamp.
 * `endDateTime` Ending date time for the retrieval criteria of the subscriptions. Format: Y-m-d H:i:s or Unix timestamp.
 * `fileName` File name of specific subscription requested by user.
 * `bookmark` Bookmarks the file for next retrieval.

_If you provide a `beginDateTime`, but no `endDateTime`, the `endDateTime` will default to the current date time._

_To use the `fileName` parameter, do not provide a `beginDateTime`._