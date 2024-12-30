<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VedicDetail extends Model
{
    use HasFactory;
    protected $table = 'pandit_vedic';
    protected $fillable = [
        'otp', 'pandit_id', 'mobile_no',
    ];

}
