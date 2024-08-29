<?php
namespace amculin\ektp\generator\base;

class City
{
    public string $fullId;
    public string $id;
    public string $name;
    public Province $province;
    public array $dataset;
    public array $cities;

    public function getCities(): array
    {
        return $this->cities;
    }

    public function setCities(array $cities)
    {
        $this->cities = $cities;
    }

    public function getDataset(): array
    {
        return $this->dataset;
    }

    public function setDataset(array $data)
    {
        $this->dataset = $data;
    }

    public function getFullId(): string
    {
        return $this->fullId;
    }

    public function setFullId(string $fullID)
    {
        $this->fullId = $fullID;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getProvince(): Province
    {
        return $this->province;
    }

    public function setProvince(Province $province)
    {
        $this->province = $province;
    }
}
