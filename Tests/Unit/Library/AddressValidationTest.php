<?php

namespace Octante\UpsAPIBundle\Tests\Unit\Library;

/*
 * This file is part of the UpsAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Octante\UpsAPIBundle\Library\AddressValidationWrapper;

class AddressValidationTest extends \PHPUnit_Framework_TestCase
{
    private $addressValidationMock;

    public function setUp()
    {
        $this->addressValidationMock = $this->getMock('Ups\AddressValidation');
    }

    /**
     * when: validateIsCalled
     * should: callUpsAddressValidationValidateMethod.
     */
    public function testAddressValidationValidateMethodIsCalled()
    {
        $addressMock = $this->getMock('Ups\Entity\Address');

        $this->addressValidationMock
            ->expects($this->once())
            ->method('validate')
            ->with(
                $addressMock,
                \Ups\AddressValidation::REQUEST_OPTION_ADDRESS_VALIDATION,
                15
            );

        $sut = new AddressValidationWrapper($this->addressValidationMock);

        $sut->validate(
            $addressMock,
            \Ups\AddressValidation::REQUEST_OPTION_ADDRESS_VALIDATION,
            15
        );
    }

    /**
     * when: getRequestIsCalled
     * should: callUpsAddressValidationGetRequestMethod.
     */
    public function testAddressValidationGetRequestMethodIsCalled()
    {
        $requestMock = $this->getMock('Ups\Request');
        $this
            ->addressValidationMock
            ->method('getRequest')
            ->willReturn($requestMock);

        $sut = new AddressValidationWrapper($this->addressValidationMock);
        $sut->setRequest($requestMock);
        $request = $sut->getRequest();
        $this->assertInstanceOf('Ups\Request', $request);
    }

    /**
     * when: getResponseIsCalled
     * should: callUpsAddressValidationGetResponseMethod.
     */
    public function testAddressValidationGetResponseMethodIsCalled()
    {
        $responseMock = $this->getMock('Ups\Response');
        $this
            ->addressValidationMock
            ->method('getResponse')
            ->willReturn($responseMock);

        $sut = new AddressValidationWrapper($this->addressValidationMock);
        $sut->setResponse($responseMock);
        $response = $sut->getResponse();
        $this->assertInstanceOf('Ups\Response', $response);
    }
}
