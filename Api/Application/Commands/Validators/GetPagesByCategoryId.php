<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Validators;

use Demo\Api\Application\Contracts\CommandInterface;

class GetPagesByCategoryId extends AbstractValidator
{
    public function validate(CommandInterface $command): bool
    {
        $this->validator = $this->validatorFactory->make($command->all(), [
            'category_id' => 'required|integer|min:1',
            'offset' => 'integer|min:0',
            'limit' => 'integer|min:1',
            'sort_field' => 'string|in:id,title,date|nullable',
            'sort_order' => 'string|in:asc,desc|nullable'
        ],
        [
            'required' => 'The :attribute field is required',
            'integer' => 'The :attribute field must be integer',
            'string' => 'The :attribute field must be string',
            'min' => 'The :attribute field must have a minimum value of :min',
            'in' => 'The :attribute field must be one of the following types: :values'
        ]);

        return $this->validator->passes();
    }
}