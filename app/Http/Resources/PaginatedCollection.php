<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class PaginatedCollection extends ResourceCollection
{
    public function withResponse($request, $response): void
    {
        $jsonResponse = json_decode($response->getContent(), true);
        unset($jsonResponse["links"],$jsonResponse["meta"]);
        $response->setContent(json_encode($jsonResponse));
    }

    public function with($request): array
    {
        return [
            "pagination" => [
                "total" => $this->total(),
                "count" => $this->count(),
                "per_page" => $this->perPage(),
                "current_page" => $this->currentPage(),
                "total_pages" => $this->lastPage(),
            ],
        ];
    }
}