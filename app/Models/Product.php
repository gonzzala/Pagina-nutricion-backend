<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "product_id";
    protected $fillable = [
        'product_id',
        'name',
        'description',
        'preview',
        'price',
        'image',
        'category_id',
    ];

    public function images () : HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function category () : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
