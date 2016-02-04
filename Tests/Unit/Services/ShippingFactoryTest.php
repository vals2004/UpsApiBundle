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

use Octante\UpsAPIBundle\Services\ShippingFactory;

class ShippingFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsShippingInstance.
     */
    public function testReturnUpsShippingInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsShippingInstance = ShippingFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\ShippingWrapper', $upsShippingInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsShippingInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsShippingInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsShippingInstance = ShippingFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\ShippingWrapper', $upsShippingInstance);
    }

    /**
     * when: createIsCalled
     * with: aRequestClass
     * should: returnAnUpsShippingInstanceWithARequestObject.
     */
    public function testReturnUpsShippingInstanceUsingARequestClass()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsShippingInstance = ShippingFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            false,
            'Ups\Request'
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\ShippingWrapper', $upsShippingInstance);
    }
}
