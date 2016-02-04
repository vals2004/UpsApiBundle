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

use Octante\UpsAPIBundle\Services\RateFactory;

class RateFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsRateInstance.
     */
    public function testReturnUpsRateInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsRateInstance = RateFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\RateWrapper', $upsRateInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsRateInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsRateInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsRateInstance = RateFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\RateWrapper', $upsRateInstance);
    }
}
