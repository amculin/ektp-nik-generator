<?php

use PHPUnit\Framework\TestCase;
use amculin\ektp\generator\BirthDate;
use amculin\ektp\generator\City;
use amculin\ektp\generator\District;
use amculin\ektp\generator\KTP;
use amculin\ektp\generator\Province;

final class KTPTest extends TestCase
{
    public $ktp;

    protected function setUp(): void
    {
        $this->ktp = new KTP();
    }

    protected function tearDown(): void
    {
        $this->ktp = null;
    }

    public function testCanGenerateNIK()
    {
        // Check whether generated NIK came in string format.
        $this->assertIsString($this->ktp->getNIK());

        // Check whether generated NIK has 16 characters.
        $length = 16;

        $this->assertEquals($length, strlen($this->ktp->getNIK()));

        // Break other test for NIK into some methods
        $this->checkProvince();
        $this->checkCity();
        $this->checkDistrict();
    }

    public function checkProvince()
    {
        // Check whether generated NIK has a valid province code.
        $provinceCodeList = array_map(function($list) {
            return $list['code'];
        }, $this->ktp->getProvince()->provinces);

        $provinceCode = substr($this->ktp->getNIK(), 0, 2);

        $this->assertContains($provinceCode, $provinceCodeList);
    }

    public function checkCity()
    {
        // Check whether generated NIK has a valid city code.
        $cityCodeList = array_map(function($list) {
            return $list['code'];
        }, $this->ktp->getCity()->cities);

        $cityCode = substr($this->ktp->getNIK(), 2, 2);

        $this->assertContains($cityCode, $cityCodeList);
    }

    public function checkDistrict()
    {
        // Check whether generated NIK has a valid district code.
        $districtCodeList = array_map(function($list) {
            return $list['code'];
        }, $this->ktp->getDistrict()->districts);

        $districtCode = substr($this->ktp->getNIK(), 4, 2);

        $this->assertContains($districtCode, $districtCodeList);
    }

    public function testCanGenerateGender()
    {
        // Check whether the gender is integer
        $this->assertIsInt($this->ktp->getGender());

        // Check whether the gender is exists on the gender list
        $this->assertContains($this->ktp->getGender(), [KTP::MALE, KTP::FEMALE]);
    }

    public function testCanGenerateBirthDate()
    {
        // Check whether generated birth date is an object.
        $this->assertIsObject($this->ktp->getBirthDate());

        // Check whether generated birthdate object is instance of BirthDate class
        $this->assertInstanceOf(BirthDate::class, $this->ktp->getBirthDate());
    }

    public function testCanGenerateProvince()
    {
        // Check whether generated province is an object
        $this->assertIsObject($this->ktp->getProvince());

        // Check whether generated province object is instance of Province class
        $this->assertInstanceOf(Province::class, $this->ktp->getProvince());
    }

    public function testCanGenerateCity()
    {
        // Check whether generated city is an object
        $this->assertIsObject($this->ktp->getCity());

        // Check whether generated city object is instance of City class
        $this->assertInstanceOf(City::class, $this->ktp->getCity());
    }

    public function testCanGenerateDistrict()
    {
        // Check whether generated district is an object
        $this->assertIsObject($this->ktp->getDistrict());

        // Check whether generated district object is instance of District class
        $this->assertInstanceOf(District::class, $this->ktp->getDistrict());
    }

    public function testCanGenerateSequence()
    {
        // Check whether generated sequence came in string format.
        $this->assertIsString($this->ktp->getSequence());
    }

    public function testSequenceIsValid()
    {
        // Check whether generated sequence has 4 characters.
        $length = 4;

        $this->assertEquals($length, strlen($this->ktp->getSequence()));

        $number = (int) $this->ktp->getSequence();

        // Check whether generated sequence is greater than 0
        $this->assertGreaterThanOrEqual(0, $number);

        // Check whether generated sequence is less than 20
        $this->assertLessThanOrEqual(20, $number);
    }
}
