<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    // 🔹 GET ALL COURSES (WITH CACHE)
    public function getAllCourses()
    {
        return cache()->remember('courses', 60, function () {
            return Course::with('comments')->get();
        });
    }

    // 🔹 CREATE COURSE
    public function createCourse($data)
    {
        cache()->forget('courses');

        return Course::create($data);
    }
}
