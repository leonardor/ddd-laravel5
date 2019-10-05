<?php

declare(strict_types=1);

namespace Demo\Api\Application\Responses\Assemblers;

use Demo\Api\Application\Contracts\ResponseInterface as ApplicationResponseInterface;
use Demo\Api\Application\Responses;

use Demo\Api\Domain\Contracts\ResponseInterface as DomainResponseInterface;

class Page extends AbstractAssembler
{
    public function assemble(
        DomainResponseInterface $response
    ): ApplicationResponseInterface {
        $appResponse = new Responses\Page();

        $appResponse->id = $response->id;
        $appResponse->title = $response->title;
        $appResponse->description = $response->description;
        $appResponse->type = $response->type;
        $appResponse->is_visible = $response->is_visible;
        $appResponse->category_id = $response->category_id;
        $appResponse->date = !empty($response->date) ? (new \DateTime($response->date))->format('Y-m-d H:i:s') : null;
        $appResponse->update = !empty($response->update) ? (new \DateTime($response->update))->format ('Y-m-d H:i:s') : null;
        
        return $appResponse;
    }
}