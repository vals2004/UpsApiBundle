<?php

namespace Octante\UpsAPIBundle\Tests\Unit\Services;

/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Octante\UpsAPIBundle\Services\AddressValidationFactory;

class AddressValidationFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsAddressValidationInstance.
     */
    public function testReturnUpsAddressValidationInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsAddressValidationInstance = AddressValidationFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\AddressValidationWrapper', $upsAddressValidationInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsAddressValidationInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsAddressValidationInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsAddressValidationInstance = AddressValidationFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\AddressValidationWrapper', $upsAddressValidationInstance);
    }

    /**
     * when: createIsCalled
     * with: aRequestClass
     * should: returnAnUpsAddressValidationInstanceWithARequestObject.
     */
    public function testReturnUpsAddressValidationInstanceUsingARequestClass()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsAddressValidationInstance = AddressValidationFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            false,
            'Ups\Request'
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\AddressValidationWrapper', $upsAddressValidationInstance);
    }
}
