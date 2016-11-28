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

    /** @var array */
    private static $spreadsheetNames = [];

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
        if (!$this->hasSheetName($spreadsheetId, $name)) {
            throw new \InvalidArgumentException("Sheet $name doesn't exists for spreadsheet $spreadsheetId");
        }
        $spreadSheet = $this->googleServiceFactory->createSheets()->spreadsheets_values;
        $result = $spreadSheet->get($spreadsheetId, sprintf("%s!%s", $name, $range))->getValues();

        $result = $this->resultFactory->parseGoogleResult($result, $keys);

        return $this->resultFactory->createResult($result);
    }

    /**
     * @param $spreadsheetId
     * @param $name
     *
     * @return bool
     */
    public function hasSheetName($spreadsheetId, $name)
    {
        return in_array($name, $this->getSheetNames($spreadsheetId));
    }

    /**
     * @inheritdoc
     */
    public function getSheetNames($spreadsheetId)
    {
        if (array_key_exists($spreadsheetId, self::$spreadsheetNames)) {
            return self::$spreadsheetNames[$spreadsheetId];
        }
        $spreadSheet = $this->googleServiceFactory->createSheets()->spreadsheets;
        $names = [];
        /** @var \Google_Service_Sheets_Sheet $sheet */
        foreach ($spreadSheet->get($spreadsheetId)->getSheets() as $sheet) {
            $names[] = $sheet->getProperties()->getTitle();
        }

        return self::$spreadsheetNames[$spreadsheetId] = $names;
    }
}
