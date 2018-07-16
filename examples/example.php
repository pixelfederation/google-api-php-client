<?php

# your vendor autoload path
use PixelFederation\GoogleApi\Configuration;

require_once '../vendor/autoload.php';

$configuration = new Configuration();
$configuration->setScopes([ 'https://www.googleapis.com/auth/spreadsheets' ]);
$configuration->setAuthConfigFile('/path/to/service_account/key/tsm-definition-a0b4cf61c323.json');
$googleServiceFactory = new \PixelFederation\GoogleApi\Factory\GoogleServiceFactory($configuration);
$resultFactory = new \PixelFederation\GoogleApi\Factory\ResultFactory();
$client = new \PixelFederation\GoogleApi\Client($googleServiceFactory, $resultFactory);

$result = $client->getSheetById("1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms", "Class Data", [
    "Student Name",
    "Gender",
    "Home State",
]);

print_r($result->findBy([ 'Gender' => "Female", "Home State" => "MD" ]));
//print_r($result->findAll());
