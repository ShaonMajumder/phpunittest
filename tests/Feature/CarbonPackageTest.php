<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class CarbonPackageTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        // Any necessary setup can be done here
    }

    public function testToday()
    {
        $today = Carbon::today();
        $this->assertInstanceOf(Carbon::class, $today);
    }

    public function testAddDays()
    {
        $date = Carbon::parse('2024-02-09');
        $newDate = $date->addDays(7);
        $this->assertEquals('2024-02-16', $newDate->format('Y-m-d'));
    }

    public function testBasicAssertions()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
        $this->assertNull(null);
        $this->assertNotNull(123);
        $this->assertIsArray([]);
        $this->assertIsBool(true);
        $this->assertIsFloat(3.14);
        $this->assertIsInt(42);
        $this->assertIsNumeric('123');
        $this->assertIsObject(new \stdClass());
        $this->assertIsString('hello');
        $this->assertIsScalar('123');
        $this->assertIsCallable('strlen');
        $this->assertIsIterable([]);
        $this->assertIsNotArray(false);
        $this->assertIsNotBool('');
        $this->assertIsNotFloat('hello');
        $this->assertIsNotInt('123');
        $this->assertIsNotNumeric(false);
        $this->assertIsNotObject('string');
        $this->assertIsNotString(123);
        $this->assertIsNotScalar([]);
        $this->assertIsNotCallable(null);
        $this->assertIsNotIterable(null);
        $this->assertInstanceOf(Carbon::class, Carbon::now());
    }

    public function testArrayAssertions()
    {
        $array = ['apple', 'banana', 'cherry'];

        $this->assertContains('banana', $array);
        $this->assertNotContains('grape', $array);
        $this->assertCount(3, $array);
        $this->assertEmpty([]);
        $this->assertNotEmpty($array);
    }

    public function testEqualityAssertions()
    {
        $this->assertEquals(10, 5 + 5);
        $this->assertNotEquals(10, 6 + 5);
        $this->assertSame('5', '5');
        $this->assertNotSame('5', 5);
    }

    public function testStringAssertions()
    {
        $string = 'Hello, world!';

        $this->assertStringContainsString('world', $string);
        $this->assertStringNotContainsString('moon', $string);
        $this->assertMatchesRegularExpression('/\w+,\s\w+!/', $string);
        $this->assertDoesNotMatchRegularExpression('/\d/', $string);
        $this->assertStringStartsWith('Hello', $string);
        $this->assertStringStartsNotWith('Hola', $string);
        $this->assertStringEndsWith('!', $string);
        $this->assertStringEndsNotWith('?', $string);
    }

    public function testComparisonAssertions()
    {
        $this->assertGreaterThan(5, 10);
        $this->assertGreaterThanOrEqual(10, 10);
        $this->assertLessThan(10, 5);
        $this->assertLessThanOrEqual(5, 5);
    }

    public function testFileAssertions()
    {
        $this->assertFileExists(__FILE__);
        $this->assertFileDoesNotExist('public/index2.php');
        $this->assertFileIsReadable(__FILE__);
        $this->assertFileIsNotReadable('public/index3.php');
        $this->assertFileIsWritable(__FILE__);
        $this->assertFileIsNotWritable('public/index3.php');
    }

    public function testDirectoryAssertions()
    {
        $this->assertDirectoryExists(__DIR__);
        $this->assertDirectoryDoesNotExist('public2/');
        $this->assertDirectoryIsReadable(__DIR__);
        $this->assertDirectoryIsNotReadable('public3/');
        $this->assertDirectoryIsWritable(__DIR__);
        $this->assertDirectoryIsNotWritable('public3/');
    }

    public function testExceptionAssertions()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('This is an invalid argument.');
        $this->expectExceptionCode(100);

        throw new \InvalidArgumentException('This is an invalid argument.', 100);
    }

    public function testMiscellaneousAssertions()
    {
        $this->expectNotToPerformAssertions();
        $this->markTestIncomplete('This test is not yet implemented.');
        $this->markTestSkipped('This test is skipped for a reason.');
    }
}