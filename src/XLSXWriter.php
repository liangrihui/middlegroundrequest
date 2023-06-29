<?php
namespace Lrh\MiddlegroundRequest;

use GuzzleHttp\Client;

class XLSXWriter
{

    /**
     * 执行动作
     * 
     */
    function run($option) {

        $client = new Client();
        // post:form_params  get:query
        $response = $client->get($option['url'].'/api/exportData', ['query' => $option]);
        $reposInfo = json_decode($response->getBody(), true);

        return $reposInfo;
        // return [];
    }
}