<?php

use PHPUnit\Framework\TestCase;
use Tanigami\Money\Currency;
use Tanigami\Money\Money;

class HttpMethodTest extends TestCase
{
    public function testEqualsReturnsTrueIfAmountAndCurrencyAreEqual()
    {
        $this->assertTrue((new Money(123.45, Currency::usd()))->equals(new Money(123.45, Currency::usd())));
        $this->assertFalse((new Money(123.45, Currency::usd()))->equals(new Money(543.21, Currency::usd())));
        $this->assertFalse((new Money(12345, Currency::usd()))->equals(new Money(12345, Currency::jpy())));
    }

    public function testDuplicatedMoneyEqualsToButIsNotIdenticalToOriginalMoney()
    {
        $originalMoney = new Money(123.45, Currency::usd());
        $duplicatedMoney = $originalMoney->duplicate();
        $this->assertTrue($originalMoney->equals($duplicatedMoney));
        $this->assertFalse($originalMoney === $duplicatedMoney);
    }

    public function testMoneysAreAddedWithoutSideEffect()
    {
        $money = new Money(123.45, Currency::usd());
        $anotherMoney = new Money(543.21, Currency::usd());
        $this->assertTrue($money->add($anotherMoney)->equals(new Money(666.66, Currency::usd())));
        $this->assertTrue($money->equals(new Money(123.45, Currency::usd())));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Moneys with different currencies cannot be added: USD, JPY
     */
    public function testMoneysWithDifferentCurrenciesCannotBeAdded()
    {
        (new Money(123.45, Currency::usd()))->add(new Money(12345, Currency::jpy()));
    }

    public function testIncreaseByAmountIncreasesAmountWithourSideEffect()
    {
        $money = new Money(123.45, Currency::usd());
        $increasedMoney = $money->increaseAmountBy(543.21);
        $this->assertTrue($increasedMoney->equals(new Money(666.66, Currency::usd())));
        $this->assertTrue($money->equals(new Money(123.45, Currency::usd())));
    }
}
