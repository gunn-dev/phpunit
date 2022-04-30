<?php declare(strict_types=1);

use App\Test\TestClass;
use PHPUnit\Framework\TestCase;

final class ArrayHasKeyTest extends TestCase {


    /**
     * @covers HayKey
     */
    public function testFailure()
    {
        $this->assertArrayHasKey('foo', ['foo'=> 'hello']);
    }

    /**
     * @covers HayKey
     */
    public function testAttribute()
    {
        $this->assertClassNotHasAttribute('foo', stdClass::class);
 
    }

    /**
     * @covers HayKey
     */
    public function testFailure2()
    {
        $this->assertEqualsCanonicalizing([3, 2, 1], [2, 3, 1]);
    }

    /**
     * @covers HayKey
     */
    public function testWithDelta()
    {
        $this->assertEqualsWithDelta(1.0, 1.3, 0.5);
    }
}