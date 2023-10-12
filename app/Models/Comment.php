<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'is_show',
        'content',
    ];

    public function media()
    {
        return $this->morphMany(Media::class,'mediaable');
    }

}
