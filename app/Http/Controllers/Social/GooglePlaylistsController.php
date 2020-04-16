<?php

namespace App\Http\Controllers\Social;

use App\GetGooglePlaylists;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GooglePlaylistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GooglePlaylists.index');
    }

private function GoogleClient()
    // This is the Google code from https://developers.google.com/youtube/v3/code_samples/code_snippets?apix=true
{
    $client = new Google_Client();
    $client->setApplicationName('API code samples');
    $client->setScopes([
        'https://www.googleapis.com/auth/youtube.readonly',
    ]);
    $client->setAuthConfig('YOUR_CLIENT_SECRET_FILE.json');
    $client->setAccessType('offline');

// Request authorization from the user.
    $authUrl = $client->createAuthUrl();
    printf("Open this link in your browser:\n%s\n", $authUrl);
    print('Enter verification code: ');
    $authCode = trim(fgets(STDIN));

// Exchange authorization code for an access token.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    $client->setAccessToken($accessToken);

// Define service object for making API requests.
    $service = new Google_Service_YouTube($client);

    $queryParams = [
        'maxResults' => 25,
        'mine' => true
    ];

    $response = $service->playlists->listPlaylists('snippet,contentDetails', $queryParams);
    print_r($response);


}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GetGooglePlaylists  $getGooglePlaylists
     * @return \Illuminate\Http\Response
     */
    public function show(GetGooglePlaylists $getGooglePlaylists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GetGooglePlaylists  $getGooglePlaylists
     * @return \Illuminate\Http\Response
     */
    public function edit(GetGooglePlaylists $getGooglePlaylists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GetGooglePlaylists  $getGooglePlaylists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GetGooglePlaylists $getGooglePlaylists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GetGooglePlaylists  $getGooglePlaylists
     * @return \Illuminate\Http\Response
     */
    public function destroy(GetGooglePlaylists $getGooglePlaylists)
    {
        //
    }
}
