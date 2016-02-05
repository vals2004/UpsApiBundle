<?php

namespace Octante\UpsAPIBundle\Library;

/*
 * This file is part of the UpsAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Ups\QuantumView;
use Ups\RequestInterface;
use Ups\ResponseInterface;

class QuantumViewWrapper
{
    /**
     * @var \Ups\QuantumView
     */
    private $upsQuantumView;

    /**
     * Shipping constructor.
     *
     * @param QuantumView $upsQuantumView
     */
    public function __construct(QuantumView $upsQuantumView)
    {
        $this->upsQuantumView = $upsQuantumView;
    }

    /**
     * @param string $name
     * @param string $beginDateTime
     * @param string $endDateTime
     * @param string $fileName
     * @param string $bookmark
     *
     * @return \ArrayObject
     *
     * @throws \Exception
     */
    public function getSubscription(
        $name = null,
        $beginDateTime = null,
        $endDateTime = null,
        $fileName = null,
        $bookmark = null
    ) {
        return $this
            ->upsQuantumView
            ->getSubscription(
                $name,
                $beginDateTime,
                $endDateTime,
                $fileName,
                $bookmark
            );
    }

    /**
     * Return true if request has a bookmark.
     *
     * @return bool
     */
    public function hasBookmark()
    {
        return $this->upsQuantumView->hasBookmark();
    }

    /**
     * Return the bookmark.
     *
     * @return string|null
     */
    public function getBookmark()
    {
        return $this->upsQuantumView->getBookmark();
    }

    /**
     * @param string|null $bookmark
     *
     * @return $this
     */
    public function setBookmark($bookmark)
    {
        $this->upsQuantumView->setBookmark($bookmark);

        return $this;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->upsQuantumView->getRequest();
    }

    /**
     * @param RequestInterface $request
     *
     * @return $this
     */
    public function setRequest(RequestInterface $request)
    {
        $this->upsQuantumView->setRequest($request);

        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->upsQuantumView->getResponse();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return $this
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->upsQuantumView->setResponse($response);

        return $this;
    }
}
