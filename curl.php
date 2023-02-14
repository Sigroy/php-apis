<?php
declare(strict_types=1);

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api");
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    "Authorization: token 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",
//    "User-Agent: Sigroy",
];

$response_headers = [];

$header_callback = function (CurlHandle $ch, string $header) use (&$response_headers): int {

    $len = mb_strlen($header);

    $parts = explode(":", $header, 2);

    if (count($parts) < 2) {
        return $len;
    }

    $response_headers[$parts[0]] = trim($parts[1]);

    return $len;

};

$body = json_encode([
    "name" => "Created from API",
    "description" => "an example API-created repo"
]);

curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.github.com/user/repos",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT => "Sigroy",
//    CURLOPT_HEADER => true,
//    CURLOPT_HEADERFUNCTION => $header_callback,
//    CURLOPT_CUSTOMREQUEST => "POST",
//    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $body,
]);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
//$content_length = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

curl_close($ch);

echo $status_code . "<br>";

//echo '<pre>';
//print_r($response_headers);
//echo '</pre>';

echo $response . "<br>";