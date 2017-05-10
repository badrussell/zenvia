<?php

namespace Smolareck\Zenvia;

class Zenvia
{
    private $api_key;

    private $api_url = "https://api-rest.zenvia360.com.br/services/send-sms";

    private $from;

    private $number;

    private $message;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function getApiUrl()
    {
        return $this->api_url;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function send()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->getApiUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        curl_setopt($ch, CURLOPT_POST, true);

        $date = date('Y-m-d');

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
          \"sendSmsRequest\": {
            \"from\": \"{$this->getFrom()}\",
            \"to\": \"{$this->getNumber()}\",
            \"schedule\": \"{$date}\",
            \"msg\": \"{$this->getMessage()}\",
            \"callbackOption\": \"ALL\"
          }
        }");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Basic {$this->getApiKey()}",
            "Accept: application/json",
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}