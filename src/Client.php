<?php
/**
 * @author Juraj Surman <jsurman@pixelfederation.com>
 */
namespace PixelFederation\GoogleApi;

use PixelFederation\GoogleApi\Factory\GoogleServiceFactory;
use PixelFederation\GoogleApi\Factory\ResultFactory;

/**
 * Class Client
 *
 * @package PixelFederation\GoogleApi
 */
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
     * @inheritdoc
     */
    public function getSheetById($spreadsheetId, $name, array $keys, $range = 'A1:XXX')
    {
        $spreadSheet = $this->googleServiceFactory->createSheets()->spreadsheets_values;

        $result = $spreadSheet->get($spreadsheetId, sprintf("%s!%s", $name, $range))->getValues();

        return $this->resultFactory->createResult($result, $keys);
    }

    /**
     * @inheritdoc
     */
    public function getSheetNames($spreadsheetId)
    {
        $spreadSheet = $this->googleServiceFactory->createSheets()->spreadsheets;

        $names = [ ];
        /** @var \Google_Service_Sheets_Sheet $sheet */
        foreach ($spreadSheet->get($spreadsheetId)->getSheets() as $sheet) {
            $names[] = $sheet->getProperties()->getTitle();
        }

        return $names;
    }
}
