<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use League\ISO3166\ISO3166;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Faker\Factory as Faker;

class CodashopController extends Controller
{
    private $client;
    private $iso3166;

    public function __construct()
    {
        $this->client = new Client();
        $this->iso3166 = new ISO3166();
        Carbon::setLocale('id');
    }

    private function getUserData($userId, $zoneId)
    {
        $data = [
            'country' => 'ID',
            'deviceId' => Str::uuid(),
            'userId' => $userId,
            'voucherTypeName' => 'MOBILE_LEGENDS',
            'whiteLabelId' => '',
            'zoneId' => $zoneId,
        ];

        return $this->client->post('https://order-sg.codashop.com/validate', [
            'headers' => [
                'User-Agent' => $this->getRandomUserAgent(),
            ],
            'form_params' => $data
        ]);
    }

    private function getRandomUserAgent()
    {
        $faker = Faker::create();

        return $faker->userAgent;
    }

    private function formatResponse($response)
    {
        $result = $response['result'];
        $userRegTime = Carbon::createFromTimestamp($result['user_reg_time'], 'Asia/Jakarta');
        $diffForHumans = $userRegTime->diffForHumans(Carbon::now('Asia/Jakarta'), true, false, 6);

        return [
            'create_role_country' => $this->iso3166->alpha2($result['create_role_country'])['name'],
            'this_login_country' => $this->iso3166->alpha2($result['this_login_country'])['name'],
            'user_reg_time' => $userRegTime->toDateTimeString() . " WIB",
            'user_reg_time_human' => $diffForHumans,
            'username' => urldecode($result['username']),
        ];
    }

    public function send($userId, $zoneId)
    {
        try {
            $response = $this->getUserData($userId, $zoneId);
            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['result'])) {
                return [
                    'status' => true,
                    'data' => $this->formatResponse($data),
                    'message' => 'Data berhasil ditemukan.'
                ];
            }

            return [
                'status' => false,
                'author' => 'https://facebook.com/hyfan.gt',
                'message' => $data['errorMsg'] ?? 'Unknown error'
            ];

        } catch (\Exception $e) {
            return [
                'status' => false,
                'author' => 'https://facebook.com/hyfan.gt',
                'message' => 'Error: Unexpected response from server.'
            ];
        }
    }

    public function sendApi(Request $request)
    {
        try {
            $request->validate([
                'userId' => 'required|numeric|digits_between:6,10',
                'zoneId' => 'required|numeric|digits_between:4,5',
            ]);

            $response = $this->send($request->input('userId'), $request->input('zoneId'));

            return response()->json($response, $response['status'] ? 200 : 400);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'author' => 'https://facebook.com/hyfan.gt',
                'errors' => $e->errors(),
            ], 400);
        }
    }
}
