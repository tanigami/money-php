<?php

namespace Tanigami\Money;

use InvalidArgumentException;

class Money
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @param int $amount
     * @param Currency $currency
     */
    public function __construct(int $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function amount(): int
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
        return $this->amount === $other->amount() && $this->currency()->equals($other->currency());
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
     * @param self $other
     * @return self
     */
    public function sub(self $other): self
    {
        if (!$this->currency()->equals($other->currency())) {
            throw new InvalidArgumentException(
                sprintf(
                    'Money with different currency cannot be subtracted: %s, %s',
                    $this->currency()->isoCode(),
                    $other->currency()->isoCode()
                )
            );
        }

        return new self($this->amount() - $other->amount(), $this->currency());
    }

    /**
     * @param self $other
     * @return self
     */
    public function multiply(float $multiplier): self
    {
        return new self(floor($this->amount() * $multiplier), $this->currency());
    }

    /**
     * @param int $amount
     * @return Money
     */
    public function increaseAmountBy(int $amount): self
    {
        return new self($this->amount() + $amount, $this->currency());
    }
}
