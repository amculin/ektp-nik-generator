<?php
namespace amculin\ektp\generator;

class District
{
    public string $id;
    public string $name;
    public City $city;
    public $dataset;
    public $districts;

    public function __construct(City $city)
    {
        $this->setCity($city);
        $this->retrieveDataset();
        $this->createDistrictList($city);

        $randomID = rand(0, (count($this->districts) - 1));
        $randomDistrict = $this->districts[$randomID];

        $this->setId(str_pad($randomDistrict['code'], 2, '0', STR_PAD_LEFT));
        $this->setName(ucwords(strtolower($randomDistrict['name'])));
    }

    public function createDistrictList(City $city)
    {
        $districtList = [];

        foreach ($this->dataset as $key => $val) {
            if ($city->fullId == $val['kode_kabkota']) {
                $districtList[] = [
                    'code' => explode('.', $val['kode_kecamatan'])[2],
                    'full_code' => $val['kode_kecamatan'],
                    'name' => $val['nama_kecamatan']
                ];
            }
        }

        $this->setDistricts($districtList);
    }

    public function retrieveDataset()
    {
        $rawData = file_get_contents(__DIR__ . '\data\district.json');
        $data = json_decode($rawData, true)['data'];

        $this->setDataset($data);
    }

    public function getDistricts()
    {
        return $this->districts;
    }

    public function setDistricts($districts)
    {
        $this->districts = $districts;
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

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(City $city)
    {
        $this->city = $city;
    }
}
