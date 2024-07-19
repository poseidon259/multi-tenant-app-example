<?php

namespace App\Domain\Product\DTO;

use App\Domain\Category\DTO\Category;

class Product
{
    private string $name;
    private Category $category;
    private float $price;

    /**
     * @param string $name
     * @param Category $category
     * @param float $price
     */
    public function __construct(string $name, Category $category, float $price)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
