<?php

require "ResolveToken.php";
require "DomParser.php";
require 'vendor/autoload.php';

$url = 'http://applicant-test.us-east-1.elasticbeanstalk.com/';

$guzzle = new \GuzzleHttp\Client(['cookies' => true]);
$domParser = new DomParser();

$getTokenPage = $guzzle->get($url)->getBody()->getContents();

$resoveToken = new ResolveToken($domParser->getOriginalToken($getTokenPage));

$response = $guzzle->post($url, array(
    'headers' => [
        'Referer' => 'http://applicant-test.us-east-1.elasticbeanstalk.com/',
        'Host' => 'applicant-test.us-east-1.elasticbeanstalk.com'
    ],
    'form_params' => [
        'token' => $resoveToken->getTokenSolved(),
    ]
))->getBody()->getContents();

echo sprintf("Resposta => %d \n", $domParser->getAnswer($response));




