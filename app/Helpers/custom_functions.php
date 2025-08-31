<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('uniqidReal')) {
    function uniqidReal($lenght = 12)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}

if (!function_exists('grecaptchaValidate')) {
    function grecaptchaValidate($ip, $token, $action, bool $debug = false)
    {
        $url = env('GOOGLE_RECAPTCHA_VERIFY_URL', "https://www.google.com/recaptcha/api/siteverify");
        $response = Http::asForm()->post($url, [
            'secret' => env('GOOGLE_RECAPTCHA_SECRETKEY'),
            'response' => $token,
            'remoteip' => $ip
        ]);
        if ($debug) {
            return $response->json();
        }
        if (!$response->ok()) return false;
        $responseObject = $response->object();
        return ($responseObject->success && $responseObject->action == $action && $responseObject->score >= 0.5);
    }
}

// use GuzzleHttp\Client;
// function sendCurlRequest($url, $method = "GET", $param = [])
// {
//     $client = new Client();
//     $response = $client->request($method, $url);
//     $statusCode = $response->getStatusCode();
//     return $response->getBody()->getContents();
// }