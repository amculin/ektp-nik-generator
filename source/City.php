<?php
namespace amculin\ektp\generator;

use amculin\ektp\generator\base\City as baseCity;

class City extends baseCity
{
    public function __construct(Province $province)
    {
        $this->setProvince($province);
        $this->retrieveDataset();
        $this->createCityList($province);

        $randomID = rand(0, (count($this->cities) - 1));
        $randomCity = $this->cities[$randomID];

        $this->setId(str_pad($randomCity['code'], 2, '0', STR_PAD_LEFT));
        $this->setFullId($randomCity['full_code']);
        $this->setName(ucwords(strtolower($randomCity['name'])));
    }

    public function createCityList(Province $province): void
    {
        $cityList = [];

        foreach ($this->dataset as $key => $val) {
            if ($province->id == $val['kode_provinsi']) {
                $cityList[] = [
                    'code' => explode('.', $val['kode_kabkota'])[1],
                    'full_code' => $val['kode_kabkota'],
                    'name' => $val['nama_kabkota']
                ];
            }
        }

        $this->setCities($cityList);
    }

    public function retrieveDataset(): void
    {
        $rawData = file_get_contents(__DIR__ . '\data\city.json');
        $data = json_decode($rawData, true)['data'];

        $this->setDataset($data);
    }
}
