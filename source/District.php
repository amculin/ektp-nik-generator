<?php
namespace amculin\ektp\generator;

use amculin\ektp\generator\base\District as baseDistrict;

class District extends baseDistrict
{
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

    public function createDistrictList(City $city): void
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

    public function retrieveDataset(): void
    {
        $rawData = file_get_contents(__DIR__ . '\data\district.json');
        $data = json_decode($rawData, true)['data'];

        $this->setDataset($data);
    }
}
