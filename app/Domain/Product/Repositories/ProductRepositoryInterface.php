<?php

namespace App\Domain\Product\Repositories;

use App\Domain\Product\DTO\Product;

interface ProductRepositoryInterface
{
    public function get($id): Product;
    public function save(Product $product): void;
    public function delete(Product $product): void;
}
