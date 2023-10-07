<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class InstagramController extends Controller
{
    // public function fetchPosts()
    // {
    //     // Replace with your Instagram access token and user ID
    //     $accessToken = 'IGQWRNM19SZAUtvUFJWOEJpU1FiS1NIeTJQcnc1Mi1jZAzByQU9vUV8zbFJVTzdjSkhNZAUt6d0dlaS1Kb1BEdmczaXVXYS1HeTBITFZAXbXhXX19IdkNjU2duYXEzUW1YTmlxdm5vc0thVjBiSXhiWVdmZAFFidktlbUEZD';
    //     $userId = 'codingdemon_';

    //     // Make a GET request to the Instagram Graph API
    //     $response = Http::get("https://graph.instagram.com/v12.0/{$userId}/media?fields=id,caption,media_type,media_url,permalink,timestamp&access_token={$accessToken}");

    //     // Check for a successful response
    //     if ($response->successful()) {
    //         $instagramPosts = $response->json()['data'];

    //         // Process and pass the Instagram posts to a view
    //         return view('instagram-posts', ['instagramPosts' => $instagramPosts]);
    //     } else {
    //         // Handle the API request error
    //         return 'Error fetching Instagram posts';
    //     }
    // }
    // //

    public function fetchFeeds()
    {
        // Replace with your Instagram access token
        $accessToken = 'IGQWRPUkl6RFpueG1Fd0cxSWV5ME5ScnJ4RmVyVkNvZATN3WlBoa1F4aEFid1RZAeDctOTlxd1J1ejdOWnhqQ0VZAWEJvaVdJZAElwbi1DNFd2bjJEdkF4Nk1SRGFwaE81aUpqV1FFcndpUENhOXZAmMGM1S25hMUlwTE0ZD';

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
