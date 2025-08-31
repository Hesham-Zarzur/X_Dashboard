<?php

namespace App\Helpers;

class Telegram
{
    private $token = null;
    private $url = 'https://api.telegram.org/bot';
    public $param;

    function __construct(String $token)
    {
        $this->token = $token;
    }

    function set($param)
    {
        $this->param = $param;
        return $this;
    }

    function send()
    {
        return $this->curlExec('/sendMessage', $this->param);
    }

    private function curlExec($method)
    {
        $url = $this->url . $this->token . $method;
        $headers = [
            'Content-Type:application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->param));

        $result = curl_exec($ch);
        $status = $result !== false;
        $error = $status ? '' : curl_error($ch);
        curl_close($ch);
        return ['status' => $status, 'result' => $result, 'error' => $error];
    }
}
