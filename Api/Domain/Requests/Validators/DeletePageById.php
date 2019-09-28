<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Requests\Validators;

use Demo\Api\Domain\Contracts\RequestInterface;

class DeletePageById extends AbstractValidator
{
    public function validate(RequestInterface $request): bool
    {
        $this->validator = $this->validatorFactory->make($request->all(), [
            'id' => 'required|integer|min:1',
            [
                'required' => 'The :attribute field is required',
                'integer' => 'The :attribute field must be integer',
                'min' => 'The :attribute field must have a minimum value of :min'
            ]
        ]);

        return $this->validator->passes();
    }
}