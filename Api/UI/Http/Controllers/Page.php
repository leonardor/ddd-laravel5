<?php

declare(strict_types=1);

namespace Demo\Api\UI\Http\Controllers;

use Demo\Api\Application;

use Demo\Api\UI\Http\Requests\Transformers;

use \Illuminate\Http\{
    Request,
    Response
};

class Page extends AbstractController
{
    public function index(Request $request): Response
    {
        /**
         * @var Application\Commands\GetPagesByCategoryId
         */
        $appRequest = resolve(Transformers\GetPagesByCategoryId::class)
                            ->transform($request);
       
        try {
            /**
             * @var Application\Responses\PageAggregate
             */
            $appResponse = resolve(Application\Usecases\GetPagesByCategoryId::class)
                                ->execute($appRequest);

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
         * @var Application\Commands\GetPageById
         */
        $appRequest = resolve(Transformers\GetPageById::class)
                            ->transform($request);

        try {
            /**
             * @var Application\Responses\Page
             */
            $appResponse = resolve(Application\Usecases\GetPageById::class)
                                ->execute($appRequest);

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
         * @var Application\Commands\DeletePageById
         */
        $appRequest = resolve(Transformers\DeletePageById::class)
                            ->transform($request);
        
        try {
            /**
             * @var Application\Responses\Page
             */
            $appResponse = resolve(Application\Usecases\DeletePageById::class)
                                ->execute($appRequest);

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
         * @var Application\Commands\UpdatePageById
         */
        $appRequest = resolve(Transformers\PutPageById::class)
                            ->transform($request);
        
        try {
            /**
             * @var Application\Responses\Page
             */
            $appResponse = resolve(Application\Usecases\UpdatePageById::class)
                                ->execute($appRequest);

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
         * @var Application\Commands\CreatePage
         */
        $appRequest = resolve(Transformers\PostPage::class)
                            ->transform($request);
        
        try {
            /**
             * @var Application\Responses\Page
             */
            $appResponse = resolve(Application\Usecases\CreatePage::class)
                                ->execute($appRequest);

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
