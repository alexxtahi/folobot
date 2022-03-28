<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BotController extends Controller
{
    private string $bot_token = "xoxb-3284169696583-3301146237812-IY5IcVpcnGhdFCjNZj7otgiM";
    private array $endPoints = [
        'channels' => 'https://slack.com/api/conversations.list',
    ];

    // Testing bot
    public function test()
    {
        return 'FOLO Bot Ready for work !';
    }

    // Get conversations list
    public function etChannels()
    {
        $apiURL = '';

        $headers = [
            'Authorization' => 'Bearer ' . $this->bot_token,
        ];

        $response = Http::withHeaders($headers)->post($this->endPoints['channels']);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

        dd($responseBody);
    }

    // ANCHOR Sending message to a specifi channel
    public function sendMessage(Request $request, string $msg = "Oups ! J'ai envoyé un message par erreur")
    {
        $apiURL = 'https://slack.com/api/chat.postMessage';

        $headers = [
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->bot_token,
        ];

        $body = [
            'channel' => 'U038RU8L3UM',
            'text' => $request->get('message'),
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $body);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

        dd($responseBody);

        return $responseBody;
    }
}
