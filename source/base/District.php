<?php
namespace amculin\ektp\generator\base;

class District
{
    public string $id;
    public string $name;
    public City $city;
    public array $dataset;
    public array $districts;
    
    public function getDistricts(): array
    {
        return $this->districts;
    }

    public function setDistricts(array $districts)
    {
        $this->districts = $districts;
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

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city)
    {
        $this->city = $city;
    }
}
