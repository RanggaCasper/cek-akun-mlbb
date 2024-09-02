<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use League\ISO3166\ISO3166;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CodashopController extends Controller
{
    public function send($userId, $zoneId){
        $client = new Client();
        $iso3166 = new ISO3166();

        $data = [
            'country' => 'ID',
            'deviceId' => Str::uuid(),
            'userId' => $userId,
            'voucherTypeName' => 'MOBILE_LEGENDS',
            'whiteLabelId' => '',
            'zoneId' => $zoneId,
        ];

        try {
            $response = $client->post('https://order-sg.codashop.com/validate', [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
                ],
                'form_params' => $data
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['result'])) {
                return [
                    'status' => true,
                    'data' => [
                        'create_role_country' => $iso3166->alpha2($data['result']['create_role_country'])['name'],
                        'this_login_country' => $iso3166->alpha2($data['result']['this_login_country'])['name'],
                        'user_reg_time' => Carbon::createFromTimestamp($data['result']['user_reg_time'], 'Asia/Jakarta')->toDateTimeString() . " WIB",
                        'username' => urldecode($data['result']['username']),
                    ]
                ];
            } elseif (isset($data['success']) && $data['success'] === false) {
                return [
                    'status' => false,
                    'message' => $data['errorMsg'] ?? 'Unknown error'
                ];
            }

        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'Error: ' . $e->getMessage()];
        }

        return ['status' => false, 'message' => 'Unexpected response from server.'];
    }
}
