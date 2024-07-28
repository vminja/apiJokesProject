<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function getJoke(Request $request){

        $category = $request->input('jokeCategory');

        // $response = Http::get("https://v2.jokeapi.dev/joke/{$category}");
        $response = Http::withoutVerifying()->get("https://v2.jokeapi.dev/joke/{$category}");

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Unable to fetch joke'], $response->status());
    }


}
