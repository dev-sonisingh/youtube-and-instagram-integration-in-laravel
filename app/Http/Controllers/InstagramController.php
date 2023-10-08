<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class InstagramController extends Controller
{
 

    public function fetchFeeds()
    {
        // Replace with your Instagram access token
        $accessToken = 'your_access_token';

        // Make a GET request to the Instagram Graph API
        $limit = 3;

        // Make a GET request to the Instagram Graph API with the limit parameter
        $response = Http::get("https://graph.instagram.com/v12.0/me/media?fields=id,caption,media_type,media_url,permalink,timestamp&limit={$limit}&access_token={$accessToken}");

        // Check for a successful response
        if ($response->successful()) {
            $instagramFeeds = $response->json()['data'];

            // Process and pass the Instagram feeds to a view
            return view('instagram-posts', ['instagramFeeds' => $instagramFeeds]);
        } else {
            // Handle the API request error
            return 'Error fetching Instagram feeds';
        }
    }
}
