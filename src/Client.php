<?php
namespace PixelFederation\GoogleApi;

use PixelFederation\GoogleApi\Factory\GoogleServiceFactory;
use PixelFederation\GoogleApi\Factory\ResultFactory;

class Client implements ClientInterface
{

    /** @var GoogleServiceFactory */
    private $googleServiceFactory;

    /** @var ResultFactory */
    private $resultFactory;

    /**
     * Client constructor.
     *
     * @param GoogleServiceFactory $googleServiceFactory
     * @param ResultFactory        $resultFactory
     */
    public function __construct(GoogleServiceFactory $googleServiceFactory, ResultFactory $resultFactory)
    {
        $this->googleServiceFactory = $googleServiceFactory;
        $this->resultFactory = $resultFactory;
    }


    /**
     * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
     * @param string $name          Name of Sheet
     * @param array  $keys          Names of column what you can retrieve
     * @param string $range         The A1 notation of the values to retrieve.
     *
     * @return Result
     */
    public function getSheetById($spreadsheetId, $name, array $keys, $range = 'A1:XXX')
    {

        $spreadSheet = $this->googleServiceFactory->createSheets()->spreadsheets_values;

        $result = $spreadSheet->get($spreadsheetId, sprintf("%s!%s", $name, $range))->getValues();

        return $this->resultFactory->createResult($result, $keys);
    }
}
