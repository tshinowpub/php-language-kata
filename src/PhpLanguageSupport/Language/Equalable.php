<?php

declare(strict_types = 1);

namespace PhpSupport\Language;

/**
 * 比較できるインターフェース
 */
interface Equalable
{
    /**
     * オブジェクトを比較する
     *
     * @param Object
     */
    public function equals($object): bool;

    /**
     * オブジェクトのハッシュを返す
     * ※ EqualsがTrueを返す場合は同じ値を返さないといけない
     *
     * @return string
     */
    public function hashCode();
}
