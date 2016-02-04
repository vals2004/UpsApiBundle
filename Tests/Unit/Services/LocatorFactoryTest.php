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

use Octante\UpsAPIBundle\Services\LocatorFactory;

class LocatorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsLocatorInstance.
     */
    public function testReturnUpsLocatorInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsLocatorInstance = LocatorFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\LocatorWrapper', $upsLocatorInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsLocatorInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsLocatorInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsLocatorInstance = LocatorFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\LocatorWrapper', $upsLocatorInstance);
    }

    /**
     * when: createIsCalled
     * with: aRequestClass
     * should: returnAnUpsLocatorInstanceWithARequestObject.
     */
    public function testReturnUpsLocatorInstanceUsingARequestClass()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsLocatorInstance = LocatorFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            false,
            'Ups\Request'
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\LocatorWrapper', $upsLocatorInstance);
    }
}
