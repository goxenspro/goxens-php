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

    private $client;



    /**
     * Goxens constructor.
     * @param $apiKey
     * @param $uid
     */
    public function __construct($apiKey, $uid)
    {
        $this->apiKey = $apiKey;
        $this->uid = $uid;
        $this->client = new Client();
    }





    public function verifySolde($apikey){

        try {
            $endpoint = Constants::BASE_URL ;

            $uri = $endpoint . '/api/credit/'. $apikey;

            $response = $this->client->request('GET', $uri , [
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

        try{

            $endpoint = Constants::BASE_URL;
            $uri =  $endpoint . '/api/sendsms/'. $apikey.'/'. $uid;
            $response = $this->client->request('POST', $uri,[
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode([
                    'numero' => $number,
                    'expediteur' => $sender,
                    'message' => $msg,
                ])
            ]);

            return $response->getStatusCode() . ' ' . $response->getReasonPhrase();

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