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

use Octante\UpsAPIBundle\Services\TimeInTransitFactory;

class TimeInTransitFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsTimeInTransitInstance.
     */
    public function testReturnUpsTimeInTransitInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTimeInTransitInstance = TimeInTransitFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TimeInTransitWrapper', $upsTimeInTransitInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsTimeInTransitInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsTimeInTransitInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTimeInTransitInstance = TimeInTransitFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TimeInTransitWrapper', $upsTimeInTransitInstance);
    }

    /**
     * when: createIsCalled
     * with: aRequestClass
     * should: returnAnUpsTimeInTransitInstanceWithARequestObject.
     */
    public function testReturnUpsTimeInTransitInstanceUsingARequestClass()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTimeInTransitInstance = TimeInTransitFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            false,
            'Ups\Request'
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TimeInTransitWrapper', $upsTimeInTransitInstance);
    }
}
