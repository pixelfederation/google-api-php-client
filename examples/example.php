<?php

require_once '../vendor/autoload.php';

$googleServiceFactory = new \PixelFederation\GoogleApi\Factory\GoogleServiceFactory('Server API key');
$resultFactory = new \PixelFederation\GoogleApi\Factory\ResultFactory();
$client = new \PixelFederation\GoogleApi\Client($googleServiceFactory, $resultFactory);

$result = $client->getSheetById('SpreadsheetID', 'Name of Sheet', [
    'id',
    'name of column 1',
    'name of column 2',
]);

print_r($result->findBy([ 'id' => 2 ]));
