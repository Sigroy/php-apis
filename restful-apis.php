<?php

$ch = curl_init();

curl_setopt_array($ch, [
   CURLOPT_URL => "https://api.github.com/gists/0226319c547081cfe0c8f6d741f4626e",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_USERAGENT => 'Sigroy',
]);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

print_r($data);

/*foreach ($data as $gist) {
    echo $gist['id'], " - ", $gist['description'], "\n";
}*/
