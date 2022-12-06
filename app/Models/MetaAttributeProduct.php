<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaAttributeProduct extends Model
{
    use HasFactory;

    protected $table = 'meta_attribute_product';

    protected $fillable = [
        'product_id',
        'meta_attribute_id'
    ];
}
