<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Contracts;

use \Illuminate\Http\{
    Response,
    Request
};

interface ControllerInterface
{
    public function index(Request $request): Response;

    public function get(Request $request, int $id): Response;

    public function delete(Request $request, int $id): Response;

    public function post(Request $request): Response;

    public function put(Request $request, int $id): Response;
}