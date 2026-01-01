<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Resources\Api\V1\LinkResource;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function store(StoreLinkRequest $request): LinkResource
    {
        $link = Link::create([
            'url' => $request->url,
            'code' => $this->generateUniqueCode(),
        ]);

        return new LinkResource($link);
    }

    public function redirect(string $code): RedirectResponse
    {
        $link = Link::where('code', $code)->firstOrFail();

        $link->increment('visits');

        return redirect()->away($link->url, 301);
    }

    private function generateUniqueCode(): string
    {
        do {
            $code = Str::random(6);
        } while (Link::where('code', $code)->exists());

        return $code;
    }
}
