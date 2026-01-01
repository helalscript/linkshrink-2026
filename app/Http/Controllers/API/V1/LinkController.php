<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Resources\Api\V1\LinkResource;
use App\Models\Link;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function store(StoreLinkRequest $request): JsonResponse
    {
        try {
            $link = Link::create([
                'url' => $request->url,
                'code' => $this->generateUniqueCode(),
            ]);

            return response()->json([
                'message' => 'Link shortened successfully.',
                'data' => new LinkResource($link),
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while shortening the link.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function redirect(string $code): RedirectResponse
    {
        try{
        $link = Link::where('code', $code)->firstOrFail();

        $link->increment('visits');
        return redirect()->away($link->url, 301);
        } catch (Exception $e) {
            return redirect()->away(url('/'), 302);
        }
    }

    private function generateUniqueCode(): string
    {
        do {
            $code = Str::random(6);
        } while (Link::where('code', $code)->exists());

        return $code;
    }
}
