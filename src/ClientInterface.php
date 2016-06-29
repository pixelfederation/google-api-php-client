<?php
/**
 * @author Juraj Surman <jsurman@pixelfederation.com>
 */
namespace PixelFederation\GoogleApi;

/**
 * Interface ClientInterface
 *
 * @package PixelFederation\GoogleApi
 */
interface ClientInterface
{
    /**
     * Get Result of Sheet data for finding
     *
     * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
     * @param string $name          Name of Sheet
     * @param array  $keys          Names of column what you can retrieve
     * @param string $range         The A1 notation of the values to retrieve.
     *
     * @return Result
     */
    public function getSheetById($spreadsheetId, $name, array $keys, $range = 'A1:XXX');

    /**
     * Return Names of all Sheets in Spreadsheet
     *
     * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
     *
     * @return array
     */
    public function getSheetNames($spreadsheetId);
}
