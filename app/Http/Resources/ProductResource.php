<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VariantResource;
use App\Models\Product;
use Attribute;

class ProductResource extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'product';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        return [
            'id' => (string) $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'sku' => $this->sku,
            'price' => (string) $this->price,
            'category' => $this->category->title,
            'manufacturer' => $this->manufacturer->name,
            'variants' =>  $this->when($this->hasVariants == true , new CombinationCollection($this->combinations)),
            'images' => $this->when($this->images->count()>0 , new ImageCollection($this->images))
        ];
    }
}
