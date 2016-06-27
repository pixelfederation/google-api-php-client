# GoogleApi PHP Client

A wrapper for the official Google api PHP client.


## Usage

To install the composer package, run the following command:
 
```bash
composer require pixelfederation/google-api-php-client
```

After the installation of the dependencies, the Client should be instantiated this way:

```php
$googleServiceFactory = new \PixelFederation\GoogleApi\Factory\GoogleServiceFactory('Server API key');
$resultFactory = new \PixelFederation\GoogleApi\Factory\ResultFactory();
 
$client = new \PixelFederation\GoogleApi\Client($googleServiceFactory, $resultFactory);
```

- $googleServiceFactory: "Server Api key" documentation - https://developers.google.com/api-client-library/php/auth/api-keys


Now you are able to call methods from ClientInterface. For example, if you can read something from https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms

```php
// $client->getSheetById($spreadsheetId, $name, array $keys, $range = 'A1:XXX');


/**
 * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
 * @param string $name          Name of Sheet
 * @param array  $keys          Names of column what you can retrieve
 * @param string $range         The A1 notation of the values to retrieve.
 *
 * @return Result
 */
$result = $client->getSheetById("1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms", "Class Data", [
    "Student Name",
    "Gender",
    "Home State",
]);

$response = $result->findBy([ 'Gender' => "Female", "Home State" => "MD" ]);

/*
Array
(
    [8] => Array
        (
            [Student Name] => Dorothy
            [Gender] => Female
            [Home State] => MD
        )

)
*/

```