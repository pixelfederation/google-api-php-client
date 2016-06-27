<?php
namespace PixelFederation\GoogleApi\Factory;

use PixelFederation\GoogleApi\Result;

class ResultFactory
{
    /**
     * @param array $result
     * @param array $keys
     *
     * @return Result
     */
    public function createResult(array $result, array $keys)
    {
        $header = array_intersect(reset($result), $keys);

        // unset header...
        unset($result[key($result)]);

        $result = array_map(function ($item) use ($header) {
            $item = array_intersect_key($item, $header);
            $item = array_combine($header, $item);

            return $item;

        }, $result);

        return new Result($result);
    }
}
