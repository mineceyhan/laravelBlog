<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company'
    ];

    public function user()
    {
        return $this->belongTo(User::class, 'user_id',  'id');
    }

}
