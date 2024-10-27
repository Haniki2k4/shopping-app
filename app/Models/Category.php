<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'seokeyword',
        'seodescription',
    ];

    // Định nghĩa mối quan hệ với bảng Post
    public function posts()
    {
        return $this->hasMany(Post::class, 'categoryID'); //mỗi category có thể nhiều post
    }
}
