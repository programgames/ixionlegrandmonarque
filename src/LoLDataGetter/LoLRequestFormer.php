<?php

namespace App\LoLDataGetter;

use App\Entity\RiotApiResponse;

class LoLRequestFormer
{
    public function urlGetRequestToArray(string $url): RiotApiResponse
    {
        $url = LoLConstants::PROTOCOL.$url;
        $url = $url.LoLConstants::API_KEY_PREFIX.LoLConstants::API_KEY;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $curlResponse = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $body = substr($curlResponse, $header_size);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $bodyAsArray = json_decode($body, true);

        if (200 != $httpCode) {
            return new RiotApiResponse($bodyAsArray, $httpCode);
        }

        return new RiotApiResponse($bodyAsArray, $httpCode);
    }

    public function checkRegion($region): bool
    {
        switch ($region) {
            case LoLConstants::SERVICE_PLATFORM_EUW:
                return true;
            case LoLConstants::SERVICE_PLATFORM_AMERICAS:
                return true;
            case LoLConstants::SERVICE_PLATFORM_ASIA:
                return true;
            case LoLConstants::SERVICE_PLATFORM_BR1:
                return true;
            case LoLConstants::SERVICE_PLATFORM_JP1:
                return true;
            case LoLConstants::SERVICE_PLATFORM_KR:
                return true;
            case LoLConstants::SERVICE_PLATFORM_LA1:
                return true;
            case LoLConstants::SERVICE_PLATFORM_LA2:
                return true;
            case LoLConstants::SERVICE_PLATFORM_NA:
                return true;
            case  LoLConstants::SERVICE_PLATFORM_NA1:
                return true;
            case LoLConstants::SERVICE_PLATFORM_EUROPE:
                return true;
            case LoLConstants::SERVICE_PLATFORM_OC1:
                return true;
            case LoLConstants::SERVICE_PLATFORM_PBE1:
                return true;
            case LoLConstants::SERVICE_PLATFORM_RU:
                return true;
            case LoLConstants::SERVICE_PLATFORM_TR1:
                return true;
            default:
                return false;
        }
    }
}
