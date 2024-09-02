<?php

use PHPUnit\Framework\TestCase;
use amculin\ektp\generator\Province;

final class ProvinceTest extends TestCase
{
    const PROVINCE_COUNT = 38;

    public $province;

    protected function setUp(): void
    {
        $this->province = new Province();
    }

    protected function tearDown(): void
    {
        $this->province = null;
    }

    public function testCanCreateProvinceList()
    {
        $this->province->createProvinceList();

        $isValid = (is_null($this->province->getProvinces()) ||
            empty($this->province->getProvinces())) ? false : true;

        $this->assertTrue($isValid);
    }

    public function testCanRetrieveDataset()
    {
        $this->province->retrieveDataset();

        $isValid = (is_null($this->province->getDataset()) ||
            empty($this->province->getDataset())) ? false : true;

        $this->assertTrue($isValid);
    }

    public function testCanGetId()
    {
        $id = $this->province->getId();

        $this->assertIsInt($id);
    }

    public function testCanSetId()
    {
        $randomID = rand(0, (count($this->province->provinces) - 1));
        $randomProvince = $this->province->provinces[$randomID];

        $this->province->setId($randomProvince['code']);

        $this->assertEquals($randomProvince['code'], $this->province->getId());
    }

    public function testIdIsValid()
    {
        $id = (string) $this->province->getId();

        $provinceCodeList = array_map(function($list) {
            return $list['code'];
        }, $this->province->getProvinces());

        $this->assertContains($id, $provinceCodeList);

        $this->assertGreaterThan(0, $id);
    }

    public function testCanGetName()
    {
        $this->assertIsString($this->province->getName());
    }

    public function testCanSetName()
    {
        $name = 'This is a test';
        $province = new Province();

        $province->setName($name);

        $this->assertEquals($name, $province->getName());
    }

    public function testNameIsValid()
    {
        $provinceNameList = array_map(function($list) {
            return ucwords(strtolower(str_replace('_', ' ', $list['name'])));
        }, $this->province->getProvinces());

        $this->assertContains($this->province->getName(), $provinceNameList);

    }

    public function testCanGetProvinces()
    {
        $this->assertIsArray($this->province->getProvinces());
    }

    public function testCanSetProvinces()
    {
        $list = [
            [
                'code' => 13,
                'name' => 'SUMATERA BARAT'
            ],
            [
                'code' => 15,
                'name' => 'JAMBI'
            ]
        ];

        $province = new Province();
        $province->setProvinces($list);

        $this->assertEquals($list, $province->getProvinces());
    }

    public function testProvinceIsValid()
    {
        $this->assertIsArray($this->province->getProvinces());

        $this->assertEquals($this::PROVINCE_COUNT, count($this->province->getProvinces()));

        $this->assertArrayHasKey('code', $this->province->provinces[0]);

        $this->assertArrayHasKey('name', $this->province->provinces[0]);
    }

    public function testCanGetDataset()
    {
        // Check whether generated provinces dataset is an array
        $this->assertIsArray($this->province->dataset);
    }

    public function testCanSetDataset()
    {
        $list = [
            [
                'kode_provinsi' => 13,
                'nama_provinsi' => 'SUMATERA BARAT'
            ],
            [
                'kode_provinsi' => 15,
                'nama_provinsi' => 'JAMBI'
            ]
        ];

        $province = new Province();
        $province->setDataset($list);

        $this->assertEquals($list, $province->getDataset());
    }

    public function testDatasetIsValid()
    {
        $this->assertIsArray($this->province->dataset);

        $this->assertEquals($this::PROVINCE_COUNT, count($this->province->dataset));

        $this->assertArrayHasKey('kode_provinsi', $this->province->getDataset()[0]);

        $this->assertArrayHasKey('nama_provinsi', $this->province->getDataset()[0]);
    }
}
