<?php

namespace App\Domain\Category\DTO;

class Category
{
    private string $name;
    private string $description;

    /**
     * @param string $description
     * @param string $name
     */
    public function __construct(string $description, string $name)
    {
        $this->description = $description;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
