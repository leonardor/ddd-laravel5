<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses\Assemblers;

use Demo\Api\Application\{
    Contracts\ResponseInterface as ApplicationResponseInterface,
    Responses,
    Responses\Assemblers
};

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

class PageCollection extends AbstractAssembler
{
    public function assemble(
        DomainResponseInterface $response
    ): ApplicationResponseInterface {
        $appResponse = new Responses\PageCollection();

        foreach ($response as $item) {
            $appResponse->append(resolve(Assemblers\Page::class)->assemble($item));
        }

        return $appResponse;
    }
}