<?php
/**
 * Created by PhpStorm.
 * User: jsurman
 * Date: 27/06/16
 * Time: 13:49
 */
namespace PixelFederation\GoogleApi;

interface ClientInterface
{
    /**
     * @param string $spreadsheetId The ID of the spreadsheet to retrieve data from.
     * @param string $name          Name of Sheet
     * @param array  $keys          Names of column what you can retrieve
     * @param string $range         The A1 notation of the values to retrieve.
     *
     * @return Result
     */
    public function getSheetById($spreadsheetId, $name, array $keys, $range = 'A1:XXX');
}