## Table Of Content

1. [About](#about)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Logging](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/logging.md#logging)
4. [License](#license-section)
6. [Address Validation Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/address-validation.md)
    * [Example](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/address-validation.md#addressvalidation-class-example)
    * [Parameters](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/address-validation.md#addressvalidation-class-parameters)
7. [QuantumView Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/quantumview.md)
    * [Example](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/quantumview.md#quantumview-class-example)
    * [Parameters](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/quantumview.md#quantumview-class-parameters)
8. [Tracking Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/tracking.md)
    * [Example](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/tracking.md#tracking-class-example)
    * [Parameters](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/tracking.md#tracking-class-parameters)
9. [Rate Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/rate.md)
    * [Example](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/rate.md#rate-class-example)
    * [Parameters](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/rate.md#rate-class-parameters)
10. [TimeInTransit Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/timeintransit.md)
    * [Example](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/timeintransit.md#timeintransit-class-example)
    * [Parameters](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/timeintransit.md#timeintransit-class-parameters)
11. [Locator Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/locator.md)
    * [Example](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/locator.md#locator-class-example)
    * [Parameters](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/locator.md#locator-class-parameters)
12. [Tradeability Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/tradeability.md)
    * [Example](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/tradeability.md#tradeability-class-example)
    * [Parameters](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/tradeability.md#tradeability-class-parameters)
13. [Shipping Class](https://github.com/octante/UpsAPIBundle/blob/master/Resources/doc/shipping.md)


<a name="about"></a>
## About

This bundle is a wrapper of ups-api library from gabrielbull. This documentation is based on the great documentation of the library.

<a name="requirements"></a>
## Requirements

This library uses PHP 5.5+.

To use the UPS API bundle, you have to [request an access key from UPS](https://www.ups.com/upsdeveloperkit). For every request,
you will have to provide the Access Key, your UPS User ID and Password.

<a name="installation"></a>
## Installation

Add `octante/ups-api-bundle` package to your `require` section in the `composer.json` file or execute this command:

``` bash
$ composer require octante/ups-api-bundle
```

Add the UpsAPIBundle to your application's kernel:

``` php
<?php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Octante\UpsAPIBundle\OctanteUpsAPIBundle(),
        // ...
    );
    ...
}
```

Add needed parameters to your parameters file.

``` yaml
ups.endpoints.rate: https://wwwcie.ups.com/webservices/Rate
ups.endpoints.shipping: https://wwwcie.ups.com/webservices/Ship
ups.endpoints.track: https://wwwcie.ups.com/webservices/Track
ups.accesskey: accesskey
ups.userId: 1234
ups.password: ThisIsASecretPassword
ups.useintegration: false
ups.request_class: ~
ups.logger: Monolog\Logger
```

Now you can get services from container:

``` php
$upsService = $this->getContainer()->get('ups.service_name');
```

<a name="logging"></a>
## Logging

To use logging the only thing you need to do is assign a logger class to the "ups.logger" parameter. 
This class needs to be compatible with [PSR-3](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md), 
you can use monolog. If you assign a class to this parameter automatically will be sent to service contructor.

Requests & responses (including XML, no access keys) are logged at DEBUG level. At INFO level only the event is reported, not the XML content. More severe problems (e.g. no connection) are logged with higher severity.


<a name="license-section"></a>
## License

PHP UPS API is licensed under [The MIT License (MIT)](LICENSE).