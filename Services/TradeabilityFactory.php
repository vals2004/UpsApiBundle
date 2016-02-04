<?php

namespace Octante\UpsAPIBundle\Services;

/*
 * This file is part of the UpsAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Octante\UpsAPIBundle\Library\TradeabilityWrapper;
use Ups\RequestInterface;

class TradeabilityFactory
{
    /**
     * Return a new instance of Shipping wrapper class.
     *
     * @return TradeabilityWrapper
     */
    public static function create(
        $accessKey,
        $userId,
        $password,
        $logger,
        $useIntegration = false,
        $requestClass = null
    ){
        $request = self::getRequest($requestClass);

        return new TradeabilityWrapper(
            new \Ups\Tradeability(
                $accessKey,
                $userId,
                $password,
                $useIntegration,
                $request,
                $logger
            )
        );
    }

    /**
     * @return RequestInterface
     */
    private static function getRequest($requestClass)
    {
        $request = null;
        if ($requestClass != '') {
            $request = new $requestClass();
        }

        return $request;
    }
}
