<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use App\CSV\CsvFileIterator;

final class StackTest extends TestCase
{
    
    /**
     * @test
     */
    public function pushAndPop(): void
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }


    public function testEmpty(): array
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack): array
    {
        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $stack): void
    {
        $this->assertSame('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }



    public function testProducerFirst(): string
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond(): string
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer(string $a, string $b): void
    {
        $this->assertSame('first', $a);
        $this->assertSame('second', $b);
    }



    /**
     * @dataProvider additionProvider
     */
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2]
        ];
    }



    /**
     * @dataProvider additionProviderName
     */
    public function testAddName(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProviderName(): array
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 2]
        ];
    }



    public function providerOne(): array
    {
        return [['provider1'], ['provider1']];
    }

    public function testProducerOne(): string
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerTwo(): string
    {
        $this->assertTrue(true);

        return 'second';
    }

    // combine depends & dataprovider, dataprovider came first
    /**
     * @depends testProducerOne
     * @depends testProducerTwo
     * @dataProvider providerOne
     */
    public function testConsumerOne(): void
    {
        $this->assertSame(
            ['provider1','first', 'second'],
            func_get_args()
        );
    }



    /**
     * @dataProvider additionWithNonNegativeNumbersProvider
     * @dataProvider additionWithNegativeNumbersProvider
     */
    public function testAddProvider(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionWithNonNegativeNumbersProvider(): array
    {
        return [
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2]
        ];
    }

    public function additionWithNegativeNumbersProvider(): array
    {
        return [
            [-1, 1, 0],
            [-1, -1, -2],
            [1, -1, 0]
        ];
    }


    public function testException(): void
    {
        $this->assertTrue(true);
        // $this->expectException(InvalidArgumentException::class);
    }
}