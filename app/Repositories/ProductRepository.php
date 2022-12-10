<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Attribute as ModelAttribute;
use App\Models\Category;
use App\Models\Combination;
use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\MetaAttribute;
use App\Models\Product;
use App\Models\ProductAttribute;

class ProductRepository implements ProductRepositoryInterface 
{
    public function getOrCreateProduct(array $data)
    {
        //query by sku if it is not found create a new record with all the data 
        return Product::firstOrCreate(['sku' => $data['sku']] , $data);
    }

    public function getOrCreateManufacturer(string $name)
    {
        return Manufacturer::firstOrCreate(['name' => $name]);
    }

    public function getOrCreateCategory(string $name)
    {
        return Category::firstOrCreate(['title' => $name]);
    }

    public function getOrCreateAttribute(string $type , $product_id)
    {
        //create the attribute if it doesn't exists --- e.g Size,Color .... 
        $attr =  ModelAttribute::firstOrCreate(['type' => $type]);

        //create a record in the pivot table attr-prod
        ProductAttribute::create([
            'attribute_id' => $attr->id,
            'product_id' => $product_id
        ]);
        return $attr;
    }

    public function getOrCreateMeta(string $value , $attribute_id)
    {
        //create the meta attribute if it doesn't exists --- e.g S-M-XXL or 100ml - 200ml .... 
        $meta =  MetaAttribute::firstOrCreate(['value' => $value] , ['attribute_id' => $attribute_id]);

        return $meta;
    }

    public function createCombination(array $data)
    {
        return Combination::create([
            "product_id" => $data['product_id'],
            "mainAttr" => $data['mainAttr'],
            "price" => floatval($data['price']),
            "attr" => isset($data['attr']) ? $data['attr'] : null,
            "quantity" => intval($data['quantity']),
        ]);
    }

    public function createImage(array $data , $p_id = null , $c_id = null)
    {
        foreach ($data as $img ) {
            Image::create([
                'url' => $img,
                'product_id' => $p_id,
                'combination_id' => $c_id
            ]);
        }

        return true;
    }

    public function filterKeys(array $data , array $keys)
    {
        $filteredArray = array_filter($data, function($v) use ($keys) 
        {
            return in_array($v, $keys);
        }, ARRAY_FILTER_USE_KEY);
        
        return $filteredArray;
    }
}