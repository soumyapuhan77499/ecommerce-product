<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'device_id', 'platform','device_model'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'userid');
    }
}
