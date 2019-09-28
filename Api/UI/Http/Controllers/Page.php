<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Controllers;

use Demo\Api\Application\Usecases;
use Demo\Api\Application\Responses;

use Demo\Api\UI\Http\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Page extends AbstractController
{
    public function index(Request $request): Response
    {
        /**
         * @var Requests\GetPagesByCategoryId
         */
        $appRequest = resolve(Transformers\GetPagesByCategoryId::class)->transform($request);
       
        try {
            /**
             * @var Responses\GetPagesByCategoryId
             */
            $appResponse = resolve(Usecases\GetPagesByCategoryId::class)->execute($appRequest);

            $response = $response = [
                'status' => 200,
                'message' => '',
                'data' => $appResponse
            ];
        } catch (\Throwable $e) {
            $response = [
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];
        }

        return response($response, 200);
    }

    public function get(Request $request, int $id): Response
    {
        $request->merge(['id'=>$id]);

        /**
         * @var Requests\GetPageById
         */
        $appRequest = resolve(Transformers\GetPageById::class)->transform($request);

        try {
            /**
             * @var Responses\GetPageById
             */
            $appResponse = resolve(Usecases\GetPageById::class)->execute($appRequest);

            $response = $response = [
                'status' => 200,
                'message' => '',
                'data' => $appResponse
            ];
        } catch (\Throwable $e) {
            $response = [
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];
        }

        return response($response, 200);
    }

    public function delete(Request $request, int $id): Response
    {
        $request->merge(['id'=>$id]);

        /**
         * @var Requests\DeletePageById
         */
        $appRequest = resolve(Transformers\DeletePageById::class)->transform($request);
        
        try {
            /**
             * @var Responses\DeletePageById
             */
            $appResponse = resolve(Usecases\DeletePageById::class)->execute($appRequest);

            $response = $response = [
                'status' => 200,
                'message' => 'The item was deleted',
                'data' => $appResponse
            ];
        } catch (\Throwable $e) {
            $response = [
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];
        }

        return response($response, 200);
    }

    public function put(Request $request, int $id): Response
    {
        $request->merge(['id'=>$id]);

        /**
         * @var Requests\UpdatePageById
         */
        $appRequest = resolve(Transformers\PutPageById::class)->transform($request);
        
        try {
            /**
             * @var Responses\UpdatePageById
             */
            $appResponse = resolve(Usecases\UpdatePageById::class)->execute($appRequest);

            $response = $response = [
                'status' => 200,
                'message' => 'The item was updated',
                'data' => $appResponse
            ];
        } catch (\Throwable $e) {
            $response = [
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];
        }

        return response($response, 200);
    }

    public function post(Request $request): Response
    {
        $request->merge(['id'=>0]);
        
        /**
         * @var Requests\CreatePage
         */
        $appRequest = resolve(Transformers\PostPage::class)->transform($request);
        
        try {
            /**
             * @var Responses\CreatePage
             */
            $appResponse = resolve(Usecases\CreatePage::class)->execute($appRequest);

            $response = $response = [
                'status' => 201,
                'message' => 'The item was created',
                'data' => $appResponse
            ];
        } catch (\Throwable $e) {
            $response = [
                'status' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];
        }

        return response($response, 200);
    }
}
