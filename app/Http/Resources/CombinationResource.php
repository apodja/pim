<?php

namespace App\Http\Resources;

use App\Models\MetaAttribute;
use Illuminate\Http\Resources\Json\JsonResource;

class CombinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = array(
            $this->attrType($this->metaMain->id) => $this->metaMain->value,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'images' => new ImageCollection($this->images)
        );

        // merge only if relation exists
        if ($this->meta != null) 
        {
            $key = $this->attrType($this->meta->id);
            $data = array(
                $this->attrType($this->metaMain->id) => $this->metaMain->value,
                $key => $this->meta->value,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'images' => new ImageCollection($this->images)
            );
        }
        
        return $data;
    }

    protected function attrType(int $id): string
    {
        $attr = MetaAttribute::findOrFail($id);
        return $attr->attribute->type;
    }
}
