<?php
namespace amculin\ektp\generator\base;

class Province
{
    public int $id;
    public string $name;
    public array $dataset;
    public array $provinces;
    
    public function getDataset(): array
    {
        return $this->dataset;
    }

    public function setDataset(array $data): void
    {
        $this->dataset = $data;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProvinces(): array
    {
        return $this->provinces;
    }

    public function setProvinces(array $provinces): void
    {
        $this->provinces = $provinces;
    }
}
