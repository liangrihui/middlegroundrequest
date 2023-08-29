<?php
namespace Lrh\MiddlegroundRequest;

use GuzzleHttp\Client;

class QuickDBServices
{

    /**
     * 执行动作
     * 
     */
    function run($option) {

        $client = new Client();
        $response = $client->post($option['url'], ['form_params' => $option]);
        $reposInfo = json_decode($response->getBody(), true);
        return $reposInfo;
    }
}
