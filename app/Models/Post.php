<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $casts = [
        'published_date' => 'datetime'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
