<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ZoomService
{
    protected $baseUrl = 'https://api.zoom.us/v2';

    protected function getAccessToken()
    {
        $response = Http::withBasicAuth(
            env('ZOOM_CLIENT_ID'),
            env('ZOOM_CLIENT_SECRET')
        )->asForm()->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' => env('ZOOM_ACCOUNT_ID'),
        ]);

        return $response->json()['access_token'] ?? null;
    }

    public function createMeeting($data)
    {
        $token = $this->getAccessToken();
        if (!$token) {
            throw new \Exception("Gagal mendapatkan token akses Zoom.");
        }

        $response = Http::withToken($token)->post("{$this->baseUrl}/users/me/meetings", [
            'topic' => $data['judul'],
            'type' => 2,
            'start_time' => \Carbon\Carbon::parse($data['jadwal'])->toIso8601String(),
            'duration' => $data['durasi'] ?? 60,
            'timezone' => 'Asia/Jakarta',
            'agenda' => $data['deskripsi'],
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'waiting_room' => true,
            ],
        ]);
        if ($response->failed()) {
        throw new \Exception('Zoom API gagal: ' . $response->body());
    }
        return $response->json();
    }
}

// // class ZoomService
// {
//     public function getAccessToken()
//     {
//         return Cache::remember('zoom_access_token', 3500, function () {
//             $response = Http::asForm()->post('https://zoom.us/oauth/token', [
//                 'grant_type'    => 'account_credentials',
//                 'account_id'    => env('ZOOM_ACCOUNT_ID'),
//             ])->withBasicAuth(
//                 env('ZOOM_CLIENT_ID'),
//                 env('ZOOM_CLIENT_SECRET')
//             );

//             if ($response->failed()) {
//                 throw new \Exception('Failed to get Zoom token');
//             }

//             return $response->json()['access_token'];
//         });
//     }

//     public function createMeeting($hostId, $data)
//     {
//         $token = $this->getAccessToken();

//         $response = Http::withToken($token)->post("https://api.zoom.us/v2/users/{$hostId}/meetings", [
//             'topic'      => $data['topic'],
//             'type'       => 2, // Scheduled meeting
//             'start_time' => $data['start_time'], // format: Y-m-d\TH:i:s
//             'duration'   => $data['duration'],   // in minutes
//             'timezone'   => 'Asia/Jakarta',
//             'agenda'     => $data['agenda'],
//             'settings'   => [
//                 'join_before_host' => true,
//                 'approval_type'    => 0,
//                 'registration_type'=> 1,
//                 'enforce_login'    => false,
//                 'waiting_room'     => false,
//             ]
//         ]);

//         if ($response->failed()) {
//             throw new \Exception('Failed to create Zoom meeting');
//         }

//         return $response->json();
//     }
// }


