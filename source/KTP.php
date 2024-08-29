<?php
namespace amculin\ektp\generator;

use amculin\ektp\generator\base\KTP as baseKTP;

class KTP extends baseKTP
{
    public function __construct()
    {
        $this->generateNIK();
    }

    public function generateNIK()
    {
        $this->generateProvince();
        $this->generateCity($this->province);
        $this->generateDistrict($this->city);
        $this->generateGender();
        $this->generateBirthDate();
        $this->generateSequence();

        $this->setNIK(
            $this->getProvince()->id .
            $this->getCity()->id .
            $this->getDistrict()->id .
            $this->getBirthDate()->birthDate .
            $this->getSequence()
        );
    }

    public function generateBirthDate(): void
    {
        $birthDate = new BirthDate($this->getGender());

        $this->setBirthDate($birthDate);
    }

    public function generateCity(Province $province): void
    {
        $city = new City($province);

        $this->setCity($city);
    }

    public function generateGender(): void
    {
        $this->setGender(rand($this::MALE, $this::FEMALE));
    }

    public function generateDistrict(City $city): void
    {
        $district = new District($city);

        $this->setDistrict($district);
    }

    public function generateProvince(): void
    {
        $province = new Province();

        $this->setProvince($province);
    }

    public function generateSequence(): void
    {
        $randomSequence = rand (1, 20);

        $this->setSequence(str_pad($randomSequence, 4, '0', STR_PAD_LEFT));
    }
}
