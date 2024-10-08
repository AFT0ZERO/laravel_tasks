<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory , softDeletes;

    protected $fillable=[
        'name',
        'email',
        'subject',
        'message',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
