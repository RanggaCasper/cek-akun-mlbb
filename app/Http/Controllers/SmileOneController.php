<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use League\ISO3166\ISO3166;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Faker\Factory as Faker;

class SmileOneController extends Controller
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
            'user_id' => $userId,
            'zone_id' => $zoneId,
            'pid' => 25,
            'checkrole' => 1,
            'pay_method' => '',
            'channel_method' => '',
        ];

        return $this->client->post('https://www.smile.one/merchant/mobilelegends/checkrole/', [
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
        return [
            'create_role_country' => $this->iso3166->alpha2($response['create_role_country'])['name'],
            'username' => $response['username'],
        ];
    }

    public function send($userId, $zoneId)
    {
        try {
            $response = $this->getUserData($userId, $zoneId);
            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['code']) && $data['code'] == 200) {
                return [
                    'status' => true,
                    'data' => $this->formatResponse($data),
                ];
            }

            return [
                'status' => false,
                'errors' => 'Invalid User Id',
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'errors' => 'Error: Unexpected response from server.'
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
                'errors' => $e->errors(),
            ], 400);
        }
    }
}
