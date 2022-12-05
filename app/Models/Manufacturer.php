<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_url'
    ];

    /**
     * Get all of the products for the Manufacturer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
