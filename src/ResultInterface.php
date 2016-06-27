<?php
/**
 * Created by PhpStorm.
 * User: jsurman
 * Date: 27/06/16
 * Time: 13:28
 */
namespace PixelFederation\GoogleApi;

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