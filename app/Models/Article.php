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
        'link',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);  // Assuming the foreign key is 'user_id'
    }

    // Define the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);  // Assuming the foreign key is 'category_id'
    }
    public function usersWhoLiked()
{
    return $this->belongsToMany(User::class, 'article_user_like')->withTimestamps();
}

    
    
}
