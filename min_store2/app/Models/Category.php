<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    protected $fillable=[
        'category_name',
        'category_description',
        'image'
    ];
}
