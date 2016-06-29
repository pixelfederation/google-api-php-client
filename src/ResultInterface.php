<?php
/**
 * @author Juraj Surman <jsurman@pixelfederation.com>
 */
namespace PixelFederation\GoogleApi;

/**
 * Interface ResultInterface
 *
 * @package PixelFederation\GoogleApi
 */
interface ResultInterface
{
    /**
     * @param array $filters
     * @param int   $limit
     * @param int   $offset
     *
     * @return array
     */
    public function findBy(array $filters, $limit = null, $offset = 0);

    /**
     * @param array $filter
     *
     * @return array
     */
    public function findOneBy(array $filter);

    /**
     * @return array
     */
    public function findAll();
}
