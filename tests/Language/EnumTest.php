<?php

declare(strict_types = 1);

namespace PhpSupport\Tests\Language;

class EnumTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function 定数を元にオブジェクトを作成できる ()
    {
        $enumFixture = EnumFixture::FIXTURE1();

        $this->assertTrue($enumFixture instanceof EnumFixture);
    }

    /**
     * @test
     */
    public function オブジェクトを比較できる()
    {
        $enumFixture1 = EnumFixture::FIXTURE1();

        $enumFixture2 = EnumFixture::FIXTURE2();

        $this->assertTrue($enumFixture1->equals(EnumFixture::FIXTURE1()));

        $this->assertFalse($enumFixture1->equals(EnumFixture::FIXTURE2()));

        //別のEnum型との比較
        $this->assertFalse($enumFixture1->equals(EnumFixtureSub::FIXTURE_SUB1()));
    }

    /**
     * @test
     */
    public function 定義されている値からオブジェクトを配列で取得できる()
    {
        $enumFixtures = EnumFixture::values();

        $this->assertTrue(is_array($enumFixtures));

        foreach ($enumFixtures as $enumFixture) {
            $this->assertTrue($enumFixture instanceof EnumFixture);
        }
    }

    /**
     * @test
     */
    public function 指定した値からオブジェクトを取得できる()
    {
        $enumFixture = EnumFixture::valueOf(EnumFixture::FIXTURE1);

        $this->assertTrue($enumFixture->equals(EnumFixture::FIXTURE1()));
    }

    /**
     * @test
     */
    public function Enum型から値を取得できる()
    {
        $enumFixture = EnumFixture::FIXTURE1();

        $this->assertTrue($enumFixture->value() === EnumFixture::FIXTURE1);
    }
}
