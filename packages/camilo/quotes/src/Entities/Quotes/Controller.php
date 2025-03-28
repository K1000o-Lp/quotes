<?php

namespace Camilo\Quotes\Entities\Quotes;

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

        $response = Http::get(config('quotes.base_url'), [
            'skip' => $skip,
            'limit' => $limit
        ]);

        return $response->json();
    }

    public function show($id)
    {
        $response = Http::get(config('quotes.base_url') . '/' . $id);

        return $response->json();
    }

    public function random()
    {
        $response = Http::get(config('quotes.base_url') . '/random');

        return $response->json();
    }
}