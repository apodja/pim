<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Combination extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'combination_id',
        'attribute_id'
    ];

    /**
     * Get the product that owns the Combination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * The attribute that belong to the Combination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * The main meta key that belong to the Combination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function metaMain(): BelongsTo
    {
        return $this->belongsTo(MetaAttribute::class, 'combination_id');
    }


    /**
     * The meta that belong to the Combination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function meta(): BelongsTo
    {
        return $this->belongsTo(MetaAttribute::class, 'attribute_id');
    }
}
