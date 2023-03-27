<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = false;

    protected $guarded = [];

    public function countBlog()
    {
        $this->hasMany(Blog::class, 'category_id', 'id')->count();
    }
    
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id' ,  'id');
    }

 
}
