<?php

namespace Tanigami\Money;

use InvalidArgumentException;

class Money
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @param float $amount
     * @param Currency $currency
     */
    public function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function amount(): float
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function currency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return abs($this->amount - $other->amount()) < 1e-6 && $this->currency()->equals($other->currency());
    }

    /**
     * @return self
     */
    public function duplicate(): self
    {
        return new self($this->amount(), $this->currency());
    }

    /**
     * @param self $other
     * @return self
     */
    public function add(self $other): self
    {
        if (!$this->currency()->equals($other->currency())) {
            throw new InvalidArgumentException(
                sprintf(
                    'Moneys with different currencies cannot be added: %s, %s',
                    $this->currency()->isoCode(),
                    $other->currency()->isoCode()
                )
            );
        }

        return new self($this->amount() + $other->amount(), $this->currency());
    }

    /**
     * @param float $amount
     * @return Money
     */
    public function increaseAmountBy(float $amount): self
    {
        return new self($this->amount() + $amount, $this->currency());
    }
}
