<?php
namespace amculin\ektp\generator;

use amculin\ektp\generator\base\Province as baseProvince;

class Province extends baseProvince
{
    public function __construct()
    {
        $this->retrieveDataset();
        $this->createProvinceList();

        $randomID = rand(0, (count($this->provinces) - 1));
        $randomProvince = $this->provinces[$randomID];

        $this->setId($randomProvince['code']);
        $this->setName(ucwords(strtolower(str_replace('_', ' ', $randomProvince['name']))));
    }

    public function createProvinceList(): void
    {
        $provinceList = [];

        foreach ($this->dataset as $key => $val) {
            $provinceList[] = [
                'code' => $val['kode_provinsi'],
                'name' => $val['nama_provinsi']
            ];
        }

        $this->setProvinces($provinceList);
    }

    public function retrieveDataset(): void
    {
        $rawData = file_get_contents(__DIR__ . '\data\province.json');
        $data = json_decode($rawData, true)['data'];

        $this->setDataset($data);
    }
}
