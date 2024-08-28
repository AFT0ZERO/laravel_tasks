<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable=[
        'product_name',
        'product_description',
        'product_price',
        'image',
        'category_id'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
