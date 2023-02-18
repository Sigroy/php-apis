<?php

require __DIR__ . '/vendor/autoload.php';

$client = new GuzzleHttp\Client();

$response = $client->request("GET", "https://randomuser.me/api", [
    "headers" => [
        "Authorization" => 'token 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',
        "User-Agent" => "Sigroy",
    ]
]);

/* Magic methods on the client make it easy to send synchronous requests:
$response = $client->get('http://httpbin.org/get');
$response = $client->delete('http://httpbin.org/delete');
$response = $client->head('http://httpbin.org/get');
$response = $client->options('http://httpbin.org/get');
$response = $client->patch('http://httpbin.org/patch');
$response = $client->post('http://httpbin.org/post');
$response = $client->put('http://httpbin.org/put');
 */

echo $response->getStatusCode() . "\n";

echo $response->getHeader('content-type')[0], "\n";
//var_dump($response->getHeader('content-type'));

echo $response->getBody();
//var_dump($response->getBody());