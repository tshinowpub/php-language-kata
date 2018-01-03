<?php

declare(strict_types = 1);

namespace PhpSupport\Money;

use PhpSupport\Language\Equalable;

/**
 * お金を扱うクラス
 *
 * ※参考 エンタープライズアーキテクチャパターン
 */
final class Money implements Equalable
{
    /**
     * 数量
     *
     * @var double $amount
     */
    private $amount;

    /**
     * 通貨
     *
     * @var Currency $currency
     */
    private $currency;

    /**
     * 通貨による少数の桁数
     *
     */
    private static $cents = [1, 10, 100, 1000];

    /**
     * @param float    $amount
     * @param Currency $currency
     */
    public function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function currency()
    {
        return $this->currency;
    }

    /**
     * {@inheritdoc}
     *
     * @param  Money $money
     * @return bool
     */
    public function equals($money): bool
    {
        return ($money instanceof Money && $this->amount === $money->amount())
            && $this->isSameCurrency($money->currency());
    }

    /**
     * {@inheritdoc}
     *
     */
    public function hashCode()
    {
        return (int) ($this->amount ^ ($this->amount >> 32));
    }

    /**
     * 同じ通貨かどうかを比較する
     *
     * @param Currency $currency
     *
     * @return bool
     */
    private function isSameCurrency(Currency $currency)
    {
        return $this->currency->equals($currency);
    }

    /**
     * 通貨の少数の桁数を返す
     *
     * @return int
     */
    private function centFactor()
    {
        self::cents[$this->currency->getDefaultFractionDigits()];
    }
}
