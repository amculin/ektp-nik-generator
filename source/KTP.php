<?php
namespace amculin\ektp\generator;

class KTP
{
    const MALE = 1;
    const FEMALE = 2;

    public $nik;
    public $province;
    public $city;
    public $district;
    public $birthDate;
    public $date;
    public $month;
    public $year;
    public $gender;
    public $sequence;

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
            $this->getBirthDate() .
            $this->getSequence()
        );
    }

    public function generateBirthDate()
    {
        $year = rand(1920, date('Y'));
        $month = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
        $date = $this->generateDate($year, $month);

        $this->setDate($date);
        $this->setMonth($month);
        $this->setYear($year);

        if ($this->gender == $this::FEMALE) {
            $date += 40;
        }

        $birthDate = $date . $month . substr($year, 2, 2);

        $this->setBirthDate($birthDate);
    }

    public function generateCity(Province $province)
    {
        $city = new City($province);

        $this->setCity($city);
    }

    public function generateDate($year, $month)
    {
        if (in_array($month, [1, 3, 5, 7, 8, 10, 12])) {
            $max = 31;
        } elseif (in_array($month, [4, 6, 9, 11])) {
           $max = 30;
        } else {
            if ($year % 4 == 0) {
                $max = 29;
            } else {
                $max = 28;
            }
        }

        $date = rand(1, $max);

        return str_pad($date, 2, '0', STR_PAD_LEFT);
    }

    public function generateGender()
    {
        $this->setGender(rand($this::MALE, $this::FEMALE));
    }

    public function generateDistrict(City $city)
    {
        $district = new District($city);

        $this->setDistrict($district);
    }

    public function generateProvince()
    {
        $province = new Province();

        $this->setProvince($province);
    }

    public function generateSequence()
    {
        $randomSequence = rand (1, 20);

        $this->setSequence(str_pad($randomSequence, 4, '0', STR_PAD_LEFT));
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($date)
    {
        $this->birthDate = $date;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(City $city)
    {
        $this->city = $city;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function setDistrict(District $district)
    {
        $this->district = $district;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function setMonth($month)
    {
        $this->month = $month;
    }

    public function getNIK()
    {
        return $this->nik;
    }

    public function setNIK($nik)
    {
        $this->nik = $nik;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($provinceID)
    {
        $this->province = $provinceID;
    }

    public function getSequence()
    {
        return $this->sequence;
    }

    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
}
