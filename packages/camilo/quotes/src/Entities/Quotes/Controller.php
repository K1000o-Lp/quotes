<?php

namespace Camilo\Quotes\Entities\Quotes;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Controller
{
    public function index()
    {
        /**
         * @var int $limit to get the limit of quotes
         */
        $limit = request()->query('limit', 30);
        /**
         * @var int $skip to know how many quotes to skip
         */
        $skip = request()->query('skip', 0);

        $quotes = Cache::get("quotes:{$limit}:{$skip}");

        if(!$quotes) {
            $response = Http::quotes()->get("", [
                'skip' => $skip,
                'limit' => $limit
            ]);

            $quotes = $response->object();

            Cache::put("quotes:{$limit}:{$skip}", $quotes);
        }

        return response()->json($quotes);
    }

    public function show($id)
    {
        $response = Http::quotes()->get("/{$id}");

        return $response->json();
    }

    public function random()
    {
        $response = Http::quotes()->get("/random");

        return $response->json();
    }
}