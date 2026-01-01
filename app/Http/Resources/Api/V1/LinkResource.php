<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
        'short_url' => url('/api/v1/links') . '/' . $this->code,
        'original_url' => $this->url,
        'visits' => $this->visits,
        'created_at' => $this->created_at->toDateTimeString(),
    ];
    }
}
