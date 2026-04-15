<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: "E-Learning API",
    version: "1.0.0"
)]
#[OA\Server(
    url: "http://127.0.0.1:8000"
)]
class OpenApi {}
