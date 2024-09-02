<?php

use PHPUnit\Framework\TestCase;
use amculin\ektp\generator\BirthDate;

final class BirthDateTest extends TestCase
{
    public $birthDate;

    protected function setUp(): void
    {
        $gender = rand(1, 2);

        $this->birthDate = new BirthDate($gender);
    }

    protected function tearDown(): void
    {
        $this->birthDate = null;
    }

    public function testCanGenerateDate()
    {
        $year = 1998;
        $month = '09';

        $this->assertIsString($this->birthDate->generateDate($year, $month));
    }

    public function testCanGenerateMonth()
    {
        $year = 1988;

        $this->assertIsString($this->birthDate->generateMonth($year));
    }

    public function testCanSetBirthDate()
    {
        $birthDate = '270988';

        $this->birthDate->setBirthDate($birthDate);

        $this->assertEquals($birthDate, $this->birthDate->getBirthDate());
    }

    public function testCanGetBirthDate()
    {
        $this->assertIsString($this->birthDate->getBirthDate());
    }

    public function testBirthDateIsValid()
    {
        $length = 6;
        $date = substr($this->birthDate->getBirthDate(), 0, 2);

        if ($date > 40) {
            $date = $date - 40;
        }

        $month = substr($this->birthDate->getBirthDate(), 2, 2);
        $year = substr($this->birthDate->getBirthDate(), 4, 2);
        $chunkedYear = substr($this->birthDate->getYear(), 2, 2);

        $this->assertEquals($length, strlen($this->birthDate->getBirthDate()));
        $this->assertEquals($date, $this->birthDate->getDate());
        $this->assertEquals($month, $this->birthDate->getMonth());
        $this->assertEquals($chunkedYear, $year);
    }

    public function testCanSetDate()
    {
        $date = '12';

        $this->birthDate->setDate('12');
        $this->assertEquals($date, $this->birthDate->getDate());
    }

    public function testCanGetDate()
    {
        $this->assertIsString($this->birthDate->getDate());
    }

    public function testDateIsValid()
    {
        $length = 2;
        $date = strlen($this->birthDate->getDate());

        $this->assertEquals($length, $date);
        $this->assertGreaterThan(0, (int) $date);
        $this->assertLessThan(32, (int) $date);
    }

    public function testCanSetMonth()
    {
        $month = '10';

        $this->birthDate->setMonth('10');
        $this->assertSame($month, $this->birthDate->getMonth());
    }

    public function testCanGetMonth()
    {
        $this->assertIsString($this->birthDate->getMonth());
    }

    public function testMonthIsValid()
    {
        $length = 2;
        $month = strlen($this->birthDate->getMonth());

        $this->assertEquals($length, $month);
        $this->assertGreaterThan(0, (int) $month);
        $this->assertLessThan(13, (int) $month);
    }

    public function testCanSetYear()
    {
        $year = 1994;

        $this->birthDate->setYear(1994);
        $this->assertSame($year, $this->birthDate->getYear());
    }

    public function testCanGetYear()
    {
        $this->assertIsInt($this->birthDate->getYear());
    }

    public function testYearIsValid()
    {
        $length = 4;
        $year = $this->birthDate->getYear();
        $yearLength = strlen((string) $year);

        $this->assertEquals($length, $yearLength);
        $this->assertGreaterThan(1919, (int) $this->birthDate->getYear());
        $this->assertLessThanOrEqual(date('Y'), (int) $year);
    }
}
