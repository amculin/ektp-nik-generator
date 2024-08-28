<?php
namespace amculin\ektp\generator;

class City
{
    public string $fullId;
    public string $id;
    public string $name;
    public Province $province;
    public $dataset;
    public $cities;

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

    public function createCityList(Province $province)
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

    public function retrieveDataset()
    {
        $rawData = file_get_contents(__DIR__ . '\data\city.json');
        $data = json_decode($rawData, true)['data'];

        $this->setDataset($data);
    }

    public function getCities()
    {
        return $this->cities;
    }

    public function setCities($cities)
    {
        $this->cities = $cities;
    }

    public function getDataset()
    {
        return $this->dataset;
    }

    public function setDataset($data)
    {
        $this->dataset = $data;
    }

    public function getFullId()
    {
        return $this->fullId;
    }

    public function setFullId(string $fullID)
    {
        $this->fullId = $fullID;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
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

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince(Province $province)
    {
        $this->province = $province;
    }
}
