<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests\Validators;

use Demo\Api\Domain\Contracts\RequestInterface;

use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\MessageBag;

class CreatePage extends AbstractValidator
{
    public function validate(RequestInterface $request): bool
    {
        $this->validator = Validator::make($request->all(), [
            'title' => 'required|string|unique:pages,title',
            'description' => 'required|string',
            'type' => 'required|string|in:page',
            'is_visible' => 'required|boolean',
            'category_id' => 'required|integer|min:1',
            'date' => 'date|date_format:Y-m-d H:i:s',
            'update' => 'date|date_format:Y-m-d H:i:s|nullable',
            [
                'required' => 'The :attribute field is required',
                'string' => 'The :attribute field must be string',
                'integer' => 'The :attribute field must be integer',
                'array' => 'The :attribute field must be array',
                'date' => 'The :attribute field must be datetime',
                'date_format' => 'The :attribute field must be on format :date_format',
                'min' => 'The :attribute field must have a minimum value of :min'
            ]
        ]);

        return $this->validator->passes();
    }

    public function getErrors(): MessageBag
    {
        return $this->validator->errors();
    }
}