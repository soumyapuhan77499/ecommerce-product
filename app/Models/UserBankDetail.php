<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bank_name',
        'account_number',
        'ifsc_code',
        'account_holder_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
