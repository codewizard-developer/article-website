<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title',
        'abstract',
        'category_id',
        'content',
        'author_name',
        'author_email',
        'user_id', // ✅ Required for mass assignment
        'tags',
        'supporting_files',
    ];
    
    
}
