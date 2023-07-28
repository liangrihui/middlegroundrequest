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
        $response = $client->post($option['url'].'/api/exportData/'.$option['name'], ['form_params' => $option]);//参数太长了,改为Post请求，
        // $response = $client->get($option['url'].'/api/exportData', ['query' => $option]);
        $reposInfo = json_decode($response->getBody(), true);

        return $reposInfo;
    }
}
