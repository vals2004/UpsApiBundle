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

use Octante\UpsAPIBundle\Library\RateWrapper;

class RateFactory
{

    /**
     * Return a new instance of Shipping wrapper class.
     *
     * @return RateWrapper
     */
    public static function create(
        $accessKey,
        $userId,
        $password,
        $logger,
        $useIntegration = false
    ){
        return new RateWrapper(
            new \Ups\Rate(
                $accessKey,
                $userId,
                $password,
                $useIntegration,
                $logger
            )
        );
    }
}
