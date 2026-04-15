<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    // 👉 Allow mass assignment
    protected $fillable = [
        'body'
    ];

    /**
     * 🔹 Inverse Polymorphic Relation
     * A comment belongs to ANY model (Course, User, etc.)
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
