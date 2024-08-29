<?php
namespace amculin\ektp\generator\base;

class BirthDate
{
    const MALE = 1;
    const FEMALE = 2;

    public $date;
    public $month;
    public $year;
    public $birthDate;

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function setMonth(string $month)
    {
        $this->month = $month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year)
    {
        $this->year = $year;
    }
}
