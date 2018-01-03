<?php

declare(strict_types = 1);

namespace PhpSupport\Money;

use PhpSupport\Language\Equalable;

/**
 * 通貨を扱うクラス
 *
 * ※参考 エンタープライズアーキテクチャパターン
 */
class Currency implements Equalable
{
    /**
     * この通貨で使用される小数のデフォルトの桁数を返す
     *
     */
    public function getDefaultFractionDigits()
    {
    }
    
    /**
     * {@inheritdoc}
     *
     * @param  Currency $currency
     * @return bool
     */
    public function equals($currency): bool
    {
        return ($currency instanceof Currency);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function hashCode()
    {
    }
}
