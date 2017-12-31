<?php

declare(strict_types = 1);

namespace PhpSupport\Language;

/**
 * 列挙型
 *
 */
abstract class Enum
{
    /**
     * Enum value
     *
     * @var mixed
     */
    protected $value;

    public function __construct($value)
    {
       if (!is_scalar($value)) {
           throw new \InvalidArgumentException('This value is not supported. must be use scalar');
       }

       if(!static::contains($value)) {
           throw new \DomainException('This value is not allowed.');
       }

       $this->value = $value;
    }

    /**
     * 値を返す
     *
     * @var mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * 値を比較する
     */
    final public function equals(Enum $enum)
    {
        return ($this instanceof $enum || $enum instanceof $this)
            && $this->value() === $enum->value();
    }

    /**
     * 定義されている値をオブジェクトで返す
     *
     */
    public static function values()
    {
        $instances = [];

        $class = new \ReflectionClass(static::class);

        foreach ($class->getConstants() as $constant) {
            $instances[] = new static($constant);
        }

        return $instances;
    }

    /**
     * 指定した値からオブジェクトを取得する
     *
     */
    public static function valueOf($value)
    {
        return new static($value);
    }

    /**
     * 定数を元にオブジェクトを取得します
     *
     */
    public static function __callStatic($methodName, $params)
    {
        $className = static::class;

        return new $className(constant("$className::$methodName"));
    }

    /**
     * 文字列としてアクセスされたときに値を返す
     *
     */
    public function __toString()
    {
        return (string)$this->value;
    }

    /**
     * 定義されている値かどうかをチェックする
     *
     */
    private static function contains($value)
    {
        $class = new \ReflectionClass(static::class);

        return in_array($value, $class->getConstants(), true);
    }
}
