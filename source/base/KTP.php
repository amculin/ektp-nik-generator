<?php
namespace amculin\ektp\generator\base;

class KTP
{
    const MALE = 1;
    const FEMALE = 2;

    public $nik;
    public $province;
    public $city;
    public $district;
    public $birthDate;
    public $gender;
    public $sequence;

    public function getBirthDate(): BirthDate
    {
        return $this->birthDate;
    }

    public function setBirthDate(BirthDate $date): void
    {
        $this->birthDate = $date;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city): void
    {
        $this->city = $city;
    }

    public function getDistrict(): District
    {
        return $this->district;
    }

    public function setDistrict(District $district): void
    {
        $this->district = $district;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getNIK(): string
    {
        return $this->nik;
    }

    public function setNIK(string $nik): void
    {
        $this->nik = $nik;
    }

    public function getProvince(): Province
    {
        return $this->province;
    }

    public function setProvince(Province $province): void
    {
        $this->province = $province;
    }

    public function getSequence(): string
    {
        return $this->sequence;
    }

    public function setSequence(string $sequence): void
    {
        $this->sequence = $sequence;
    }
}
