<?php

namespace App\Http\Resources;

use App\Models\MetaAttribute;
use Attribute;
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
        return [
            $this->attrType($this->metaMain->id) => $this->metaMain->value,
            $this->attrType($this->meta->id) => $this->meta->value
        ];
    }

    protected function attrType(int $id): string
    {
        $attr = MetaAttribute::findOrFail($id);
        return $attr->attribute->type;
    }
}
