<?php

require __DIR__ . '/vendor/autoload.php';

$client = new GuzzleHttp\Client();

$response = $client->request("GET", "https://api.github.com/user/repos", [
    "headers" => [
        "Authorization" => 'token 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',
        "User-Agent" => "Sigroy",
    ]
]);

echo $response->getStatusCode() . "\n";

echo $response->getHeader("content-type")[0], "\n";

echo substr($response->getBody(), 0, 200), "...\n";