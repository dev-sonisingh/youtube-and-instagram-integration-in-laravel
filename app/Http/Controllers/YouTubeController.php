<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;

use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    // public function index()
    // {
    //     // Initialize the Google Client
    //     $client = new Google_Client();
    //     $client->setDeveloperKey(config('google.api_key'));

    //     // Create a YouTube service object
    //     $youtube = new Google_Service_YouTube($client);

    //     // Set the channel ID of the YouTube channel you want to fetch videos from
    //     $channelId = 'UC83wGg4Rdob7u9Ue4cx3PHQ';

    //     // Define parameters for the API request
    //     $params = [
    //         'channelId' => $channelId,
    //         'maxResults' => 10, // Number of videos to retrieve
    //     ];

    //     // Make the API request to fetch videos from the channel
    //     $videos = $youtube->search->listSearch('id,snippet', $params);

    //     // Return the videos to a view
    //     return view('youtube.index', compact('videos'));
    // }

    public function index()
    {
        // Initialize the Google Client
        $client = new Google_Client();
        $client->setDeveloperKey(config('google.api_key'));

        // Create a YouTube service object
        $youtube = new Google_Service_YouTube($client);

        // Set the channel ID of the YouTube channel you want to fetch videos from
        $channelId = 'UC83wGg4Rdob7u9Ue4cx3PHQ';

        // Define parameters for the API request
        $params = [
            'channelId' => $channelId,
            'maxResults' => 3, // Limit to only three videos
            'order' => 'date', // Sort by date in descending order (newest first)
        ];

        // Make the API request to fetch videos from the channel
        $videos = $youtube->search->listSearch('id,snippet', $params);

        // Filter out entries with no video ID
        $filteredVideos = array_filter($videos->getItems(), function ($video) {
            return $video->getId()->getVideoId() !== null;
        });
        // Return the filtered videos to a view
        return view('youtube.index', ['videos' => $filteredVideos]);
    }
}
