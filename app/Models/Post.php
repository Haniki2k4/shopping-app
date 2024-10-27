<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'categoryID',
        'description',
        'detail',
        'position',
        'image',
        'seokeyword',
        'seodescription',
        'created_by',
        'modified_by',
        'post_status',
    ];

    // Định nghĩa mối quan hệ với bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID'); //mỗi post thuộc về 1 category
    }
}
