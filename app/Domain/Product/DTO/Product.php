<?php

namespace App\Domain\Product\DTO;

use App\Domain\Category\DTO\Category;

class Product
{
    public string $name;
    public Category $category;
    public float $price;
}
