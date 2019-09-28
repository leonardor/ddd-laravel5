<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests\Validators;

use Demo\Api\Domain\Contracts\RequestInterface;

use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\MessageBag;

class DeletePageById extends AbstractValidator
{
    public function validate(RequestInterface $request): bool
    {
        $this->validator = Validator::make($request->all(), [
            'id' => 'required|integer|min:1',
            [
                'required' => 'The :attribute field is required',
                'integer' => 'The :attribute field must be integer',
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