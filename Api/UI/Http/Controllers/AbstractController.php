<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Controllers;

use Demo\Api\UI\Http\Contracts\ControllerInterface;

use App\Http\Controllers\Controller;

use \Illuminate\Http\{
    Response,
    Request
};

abstract class AbstractController extends Controller implements ControllerInterface
{
    abstract public function index(Request $request): Response;

    abstract public function get(Request $request, int $id): Response;

    abstract public function post(Request $request): Response;

    abstract public function delete(Request $request, int $id): Response;

    abstract public function put(Request $request, int $id): Response;
}