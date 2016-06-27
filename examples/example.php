<?php

# your vendor autoload path
require_once '../vendor/autoload.php';

$googleServiceFactory = new \PixelFederation\GoogleApi\Factory\GoogleServiceFactory('Server API key');
$resultFactory = new \PixelFederation\GoogleApi\Factory\ResultFactory();
$client = new \PixelFederation\GoogleApi\Client($googleServiceFactory, $resultFactory);

$result = $client->getSheetById("1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms", "Class Data", [
    "Student Name",
    "Gender",
    "Home State",
]);

print_r($result->findBy([ 'Gender' => "Female", "Home State" => "MD" ]));
//print_r($result->findAll());
