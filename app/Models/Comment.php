<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'blog_id',
        'user_id',
        'content',
        'is_suitable',
    ];

    public function blog()
    {
        return $this->hasOne(Blog::class, 'id' , 'blog_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
