## Address Validation Class (Street Level)

The Address Validation Class allow you to validate an address at street level. Suggestions are given when address is invalid.

Note: UPS has two Address Validations. This is Street Level option, which includes all option
of the normal Address Validation class and adds street level validation.

Not all countries are supported, see UPS documentation. Currently US & Puerto Rico are supported.

<a name="addressvalidation-class-example"></a>
### Example

```php

    $address = new \Ups\Entity\Address();
    $address->setAttentionName('Test Test');
    $address->setBuildingName('Test');
    $address->setAddressLine1('Address Line 1');
    $address->setAddressLine2('Address Line 2');
    $address->setAddressLine3('Address Line 3');
    $address->setStateProvinceCode('NY');
    $address->setCity('New York');
    $address->setCountryCode('US');
    $address->setPostalCode('10000');
    
    $xav = $shipping = $this->getContainer()->get('ups.address_validation);
    try {
        $response = $xav->validate($address, $requestOption = \Ups\AddressValidation::REQUEST_OPTION_ADDRESS_VALIDATION, $maxSuggestion = 15);
    } catch (Exception $e) {
        var_dump($e);
    }
```

<a name="addressvalidation-class-parameters"></a>
### Parameters

Adress Validation parameters are:

 * `address` Address object as constructed in example
 * `requestOption` One of the three request options. See documentation. Default = Address Validation.
 * `maxSuggestion` Maximum number of suggestions to be returned. Max = 50