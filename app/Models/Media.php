<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'mediaable_id',
        'mediaable_type',
        'path'
    ];

    public function mediaable()
    {
        return $this->morphTo();
    }

}
