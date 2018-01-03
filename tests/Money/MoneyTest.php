<?php

declare(strict_types = 1);

namespace PhpSupport\Tests\Language\Money;

use PhpSupport\Money\Currency;
use PhpSupport\Money\Money;

class MoneyTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function 数量を取得できる()
    {
        $money = new Money((float) 1, new Currency());

        $this->assertSame($money->amount(), (float) 1);
    }

    /**
     * @test
     */
    public function 比較できる()
    {
        $money1 = new Money((float) 10, new Currency());
        $money2 = new Money((float) 10, new Currency());

        $this->assertTrue($money1->equals($money2));

        $money3 = new Money((float) 2, new Currency());

        $this->assertFalse($money1->equals($money3));
    }
}
