<?php
/**
 * @author Juraj Surman <jsurman@pixelfederation.com>
 */
namespace PixelFederation\GoogleApi\Factory;

use PixelFederation\GoogleApi\Result;

/**
 * Class ResultFactory
 *
 * @package PixelFederation\GoogleApi\Factory
 */
class ResultFactory
{
    /**
     * @param array $result
     *
     * @return Result
     */
    public function createResult(array $result)
    {
        return new Result($result);
    }

    /**
     * @param array $result
     * @param array $keys
     *
     * @return array
     */
    public function parseGoogleResult(array $result, array $keys = [ ])
    {
        if (empty($keys)) {
            $header = reset($result);
        } else {
            $header = array_intersect(reset($result), $keys);
        }

        // unset header...
        unset($result[key($result)]);

        $result = array_map(function ($item) use ($header) {

            $outputItem = [ ];
            foreach ($header as $key => $value) {
                $outputItem[$value] = (isset($item[$key]) ? $item[$key] : null);
            }

            return $outputItem;

        }, $result);

        return $result;
    }
}
