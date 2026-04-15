<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Services\CourseService;
use OpenApi\Attributes as OA;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    #[OA\Get(
        path: "/api/courses",
        summary: "Get all courses",
        tags: ["Courses"],
        responses: [
            new OA\Response(response: 200, description: "Success")
        ]
    )]
    public function index()
    {
        return $this->courseService->getAllCourses();
    }

    #[OA\Post(
        path: "/api/courses",
        summary: "Create course",
        tags: ["Courses"],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["title"],
                properties: [
                    new OA\Property(property: "title", type: "string"),
                    new OA\Property(property: "description", type: "string"),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Created")
        ]
    )]
    public function store(Request $request)
    {
        return $this->courseService->createCourse($request->all());
    }

    #[OA\Get(
        path: "/api/courses/{id}",
        summary: "Get course by ID",
        tags: ["Courses"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Success")
        ]
    )]
    public function show($id)
    {
        return Course::with('comments')->findOrFail($id);
    }
}

