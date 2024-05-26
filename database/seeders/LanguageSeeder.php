<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Http\JsonResponse;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url    = config('external-api.languages-api.url');
        $apiKey = config('external-api.languages-api.api_key');

        $languagesList = $this->getLanguagesFromApi($url, $apiKey);

        // map on $languagesList to rename keys to match with the db
        $languagesList = array_map(function ($item) {
            return [
                'country' => array_values($item)[0],
                'code'    => array_values($item)[1]
            ];
        }, $languagesList);

        if ($languagesList) {
            Language::insert($languagesList);
        }
    }

    /**
     * Get the Language list from extrenal api
     *
     * @param string $url
     * @param string $apiKey
     *
     * @retrun array
     */
    private function getLanguagesFromApi(string $url, string $apiKey = ''): array
    {
        $languagesList = [];

        $client = new Client();

        $response = $client->get(
            $url,
            [
                'headers' => [
                    'X-RapidAPI-Key' => $apiKey
                ],
            ],
        );

        if ($response->getStatusCode() === JsonResponse::HTTP_OK) {
            $body          = $response->getBody();
            $languagesList = json_decode($body, true);
        }

        return $languagesList;
    }
}
