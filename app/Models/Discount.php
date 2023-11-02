<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name',
        'percent_off',
        'coupon_code',
<<<<<<< HEAD
=======
        'valid_until',
>>>>>>> dece221f309a6888873a1349df77751a0356c316
    ];
    use HasFactory;
}
