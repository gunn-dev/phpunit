<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{
    
    public function testFileWriting(): void
    {
        $writer = new FileWriter;

        $this->assertFalse(@$writer->write('/is-not-writeable/file', 'stuff'));
    }

    public function testExpectFooActualFoo(): void
    {
        $this->expectOutputString('foo');

        print 'foo';
    }

    public function testExpectBarActualBaz(): void
    {
        $this->expectOutputString('baz');

        print 'baz';
    }

    public function testSame(): void
    {
        $this->assertSame(
            [1, 2,  3, 4, 5, 6],
            [1, 2, 3, 4, 5, 6]
        );
    }

    // array weak comparison test
    public function testEquality(): void
    {
        $this->assertEquals(
            [1, 2, 3, 4, 5, 6],
            ['1', 2, 3, 4, 5, 6]
        );
    }
}

final class FileWriter
{
    public function write($file, $content)
    {
        $file = fopen($file, 'w');

        if ($file === false) {
            return false;
        }

        // ...
    }
}