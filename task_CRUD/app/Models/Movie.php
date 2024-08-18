<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory ,SoftDeletes ;

    protected $fillable=[
        'movie_name',
        'movie_description',
        'movie_gener'
    ];
}
