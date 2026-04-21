<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    public function search($query)
    {
        $client_id = 'ca51fcce472241fc81a9d02798d3becc';
        $client_secret = '685028d737714d1ca2f33f5a835165c5';

        // Step 1: Get access token
        $response = Http::asForm()->withBasicAuth($client_id, $client_secret)
            ->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'client_credentials',
            ]);

        $accessToken = $response->json()['access_token'];

        // Step 2: Search for song
        $result = Http::withToken($accessToken)->get('https://api.spotify.com/v1/search', [
            'q' => $query,
            'type' => 'track',
            'limit' => 1,
        ]);

        $track = $result->json()['tracks']['items'][0];
        $embedUrl = 'https://open.spotify.com/embed/track/' . $track['id'];

        return view('spotify-result', compact('embedUrl', 'track'));
    }
}

