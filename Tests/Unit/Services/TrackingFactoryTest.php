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

use Octante\UpsAPIBundle\Services\TrackingFactory;

class TrackingFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsTrackingInstance.
     */
    public function testReturnUpsTrackingInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTrackingInstance = TrackingFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TrackingWrapper', $upsTrackingInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsTrackingInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsTrackingInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTrackingInstance = TrackingFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TrackingWrapper', $upsTrackingInstance);
    }

    /**
     * when: createIsCalled
     * with: aRequestClass
     * should: returnAnUpsTrackingInstanceWithARequestObject.
     */
    public function testReturnUpsTrackingInstanceUsingARequestClass()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTrackingInstance = TrackingFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            false,
            'Ups\Request'
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TrackingWrapper', $upsTrackingInstance);
    }
}
