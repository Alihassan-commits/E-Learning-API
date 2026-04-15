<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\CommentService;
use OpenApi\Attributes as OA;

class CommentController extends Controller
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    #[OA\Post(
        path: "/api/courses/{course}/comments",
        summary: "Add comment to course",
        tags: ["Comments"],
        parameters: [
            new OA\Parameter(
                name: "course",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["body"],
                properties: [
                    new OA\Property(property: "body", type: "string")
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Comment added successfully")
        ]
    )]
    public function store(Request $request, Course $course)
    {
        return $this->commentService->addComment(
            $course,
            $request->all()
        );
    }
}
