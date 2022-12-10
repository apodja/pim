<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function getOrCreateProduct(array $data);

    public function getOrCreateCategory(string $name);

    public function getOrCreateManufacturer(string $name);

    public function getOrCreateAttribute(string $name , $product_id);

    public function getOrCreateMeta(string $value , $attribute_id);

    public function createCombination(array $data);

    public function createImage(array $data , $p_id , $c_id);

    public function filterKeys(array $data , array $keys);
}