<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'alt_text',
        'is_active',
    ];

    public function media()
    {
        return $this->morphOne(Media::class, 'mediaable');
    }

    public function getImagePathAttribute()
    {
       return !is_null(optional($this->media)->path) ? Storage::url(optional($this->media)->path) :'';
    }

}
