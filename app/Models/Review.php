<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'rating',
        'comment'
    ];

    public function media()
    {
        return $this->morphMany(Media::class,'mediaable');
    }

}
