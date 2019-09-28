<?php

declare(strict_types=1);

namespace Demo\Api\Application\Commands\Validators;

use Demo\Api\Application\Contracts\CommandInterface;

class CountPagesByCategoryId extends AbstractValidator
{
    public function validate(CommandInterface $command): bool
    {
        $this->validator = $this->validatorFactory->make($command->all(), [
            'category_id' => 'required|integer|min:1',
            [
                'required' => 'The :attribute field is required',
                'integer' => 'The :attribute field must be integer',
                'min' => 'The :attribute field must have a minimum value of :min'
            ]
        ]);

        return $this->validator->passes();
    }
}