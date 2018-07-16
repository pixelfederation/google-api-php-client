<?php
/**
 * @author Juraj Surman <jsurman@pixelfederation.com>
 */

namespace PixelFederation\GoogleApi\Factory;

use Google_Client;
use Google_Exception;
use Google_Service_Sheets;
use PixelFederation\GoogleApi\Configuration;

/**
 * Class GoogleServiceFactory
 *
 * @package PixelFederation\GoogleApi\Factory
 */
class GoogleServiceFactory
{

    /** @var Google_Client */
    private $googleClient;

    /**
     * GoogleServiceFactory constructor.
     *
     * @param Configuration $configuration
     *
     * @throws Google_Exception
     */
    public function __construct(Configuration $configuration)
    {
        $this->googleClient = new Google_Client([
            'developer_key' => $configuration->getDeveloperKey(),
        ]);
        if ($configuration->getScopes() !== null) {
            $this->googleClient->setScopes($configuration->getScopes());
        }
        if ($configuration->getAuthConfigFile() !== null) {
            $this->googleClient->setAuthConfig($configuration->getAuthConfigFile());
        }
    }

    /**
     * @return Google_Service_Sheets
     */
    public function createSheets(): Google_Service_Sheets
    {
        return new Google_Service_Sheets($this->googleClient);
    }
}
