<?php
/**
 * @author Juraj Surman <jsurman@pixelfederation.com>
 */
namespace PixelFederation\GoogleApi;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Result
 *
 * @package PixelFederation\GoogleApi
 */
class Result implements ResultInterface
{
    /** @var ArrayCollection */
    private $result;

    /**
     * Result constructor.
     *
     * @param array $result
     */
    public function __construct(array $result = [ ])
    {
        $this->result = new ArrayCollection($result);
    }


    /**
     * @param array $filters
     * @param int   $limit
     * @param int   $offset
     *
     * @return array
     */
    public function findBy(array $filters, $limit = null, $offset = 0)
    {
        $result = $this->result->filter(function ($item) use ($filters) {

            // filter all non valid conditions
            foreach ($filters as $key => $value) {
                if (!array_key_exists($key, $item) || $item[$key] != $value) {
                    return false;
                }
            }

            return true;
        });

        if (empty($limit)) {
            return $result->toArray();
        }

        return $result->slice($offset, $limit);
    }

    /**
     * @param array $filter
     *
     * @return array
     *
     */
    public function findOneBy(array $filter)
    {
        $result = $this->findBy($filter, 1);

        return reset($result);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->result->toArray();
    }
}
