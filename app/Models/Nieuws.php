<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nieuws extends Model
{
    protected $table = 'nieuws';

    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
