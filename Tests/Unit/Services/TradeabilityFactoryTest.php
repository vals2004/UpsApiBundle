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

use Octante\UpsAPIBundle\Services\TradeabilityFactory;

class TradeabilityFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * when: createIsCalled
     * should: returnAnUpsTradeabilityInstance.
     */
    public function testReturnUpsTradeabilityInstance()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTradeabilityInstance = TradeabilityFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TradeabilityWrapper', $upsTradeabilityInstance);
    }

    /**
     * when: createIsCalled
     * with: useIntegration
     * should: returnAnUpsTradeabilityInstanceWithUseIntegrationActivated.
     */
    public function testReturnUpsTradeabilityInstanceUsingIntegrationParameter()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTradeabilityInstance = TradeabilityFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            true
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TradeabilityWrapper', $upsTradeabilityInstance);
    }

    /**
     * when: createIsCalled
     * with: aRequestClass
     * should: returnAnUpsTradeabilityInstanceWithARequestObject.
     */
    public function testReturnUpsTradeabilityInstanceUsingARequestClass()
    {
        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $upsTradeabilityInstance = TradeabilityFactory::create(
            'accessKey',
            'userId',
            'password',
            $loggerMock,
            false,
            'Ups\Request'
        );
        $this->assertInstanceOf('Octante\UpsAPIBundle\Library\TradeabilityWrapper', $upsTradeabilityInstance);
    }
}
