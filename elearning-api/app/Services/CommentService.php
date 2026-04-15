<?php

namespace App\Services;

class CommentService
{
    public function addComment($course, $data)
    {
        return $course->comments()->create([
            'body' => $data['body']
        ]);
    }
}
