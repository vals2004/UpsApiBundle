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

use Octante\UpsAPIBundle\Services\QuantumViewFactory;

class QuantumViewFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsQuantumViewInstance.
     */
    public function testReturnUpsQuantumViewInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsQuantumViewInstance = QuantumViewFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\QuantumViewWrapper', $upsQuantumViewInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsQuantumViewInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsQuantumViewInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsQuantumViewInstance = QuantumViewFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\QuantumViewWrapper', $upsQuantumViewInstance);
    }

    /**
     * when: createIsCalled
     * with: aRequestClass
     * should: returnAnUpsQuantumViewInstanceWithARequestObject.
     */
    public function testReturnUpsQuantumViewInstanceUsingARequestClass()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsQuantumViewInstance = QuantumViewFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            false,
            'Ups\Request'
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\QuantumViewWrapper', $upsQuantumViewInstance);
    }
}
