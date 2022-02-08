<?php

namespace Goxens;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


/**
 * Class Goxens
 * @package Goxens
 */
class Goxens
{
    // Account api key
    private  $apiKey;

    // User uid
    private  $uid;

    private $curl;



    /**
     * Goxens constructor.
     * @param $apiKey
     * @param $uid
     */
    public function __construct($apiKey, $uid)
    {
        $this->apiKey = $apiKey;
        $this->uid = $uid;
        $this->curl = new Client();
    }





    public function verifySolde($apikey){
        $response = null;

        try {
            $endpoint = Constants::BASE_URL ;


            $response = $this->curl->request('GET', $endpoint . '/api/credit/'. $apikey, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]);

           return  $response->getBody()->getContents();

        }catch (RequestException $e){
            $body = ($e->getResponse()->getBody());

            $errors = (json_decode((string)$body));

            $errors->statusCode = $e->getResponse()->getStatusCode();

            return $errors;
        }

    }


    public function sendSms($apikey, $uid , $number, $sender , $msg){
        $response = null;

        try {
            $endpoint = Constants::BASE_URL;

            $response = $this->curl->request('POST', $endpoint . '/api/sendsms/'. $apikey.'/'. $uid, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],

                'body' => json_encode([
                    'expediteur' => $sender,
                    'numero' => $number,
                    'message' => $msg,
                ]),
            ]);

            return  $response->getBody()->getContents();
        }catch (RequestException $e){
            $body = ($e->getResponse()->getBody());

            $errors = (json_decode((string)$body));

            $errors->statusCode = $e->getResponse()->getStatusCode();

            return $errors;
        }

    }


    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return mixed
     */

    public function getUid()
    {
        return $this->uid;
    }

}