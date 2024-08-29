<?php
namespace amculin\ektp\generator;

use amculin\ektp\generator\base\BirthDate as baseBirthDate;

class BirthDate extends baseBirthDate
{
    public function __construct(int $gender)
    {
        $year = rand(1920, date('Y'));
        $month = $this->generateMonth($year);
        $date = $this->generateDate($year, $month);

        $this->setDate($date);
        $this->setMonth($month);
        $this->setYear($year);

        if ($gender == $this::FEMALE) {
            $date += 40;
        }

        $birthDate = $date . $month . substr($year, 2, 2);

        $this->setBirthDate($birthDate);
    }

    public function generateDate($year, $month): string
    {
        if ($year == date('Y') && $month == date('m')) {
            $max = date('d');
        } else {
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
        }

        $date = rand(1, $max);

        return str_pad($date, 2, '0', STR_PAD_LEFT);
    }

    public function generateMonth(int $year): string
    {
        if ($year == date('Y')) {
            $max = date('m');
        } else {
            $max = 12;
        }

        return str_pad(rand(1, $max), 2, "0", STR_PAD_LEFT);
    }
}
