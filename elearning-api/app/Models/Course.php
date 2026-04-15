<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    // 👉 Allow mass assignment
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * 🔹 Polymorphic Relation
     * One Course can have many comments
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
