<?php
namespace amculin\ektp\generator;

use amculin\ektp\generator\enum\Provinces;

class Province
{
    public int $id;
    public string $name;
    public $dataset;
    public $provinces;

    public function __construct()
    {
        $this->retrieveDataset();
        $this->createProvinceList();

        $randomID = rand(0, (count($this->provinces) - 1));
        $randomProvince = $this->provinces[$randomID];

        $this->setId($randomProvince['code']);
        $this->setName(ucwords(strtolower(str_replace('_', ' ', $randomProvince['name']))));
    }

    public function createProvinceList()
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

    public function retrieveDataset()
    {
        $rawData = file_get_contents(__DIR__ . '\data\province.json');
        $data = json_decode($rawData, true)['data'];
        $this->setDataset($data);
    }

    public function getDataset()
    {
        return $this->dataset;
    }

    public function setDataset($data)
    {
        $this->dataset = $data;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getProvinces()
    {
        return $this->provinces;
    }

    public function setProvinces($provinces)
    {
        $this->provinces = $provinces;
    }
}
