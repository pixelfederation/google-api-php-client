<?php
namespace PixelFederation\GoogleApi\Factory;

class GoogleServiceFactory
{

    /** @var \Google_Client */
    private $googleClient;

    /**
     * GoogleServiceFactory constructor.
     *
     * @param string $developerKey - API key of your Server Api key Credentials
     */
    public function __construct($developerKey)
    {
        $this->googleClient = new \Google_Client([
            'developer_key' => $developerKey,
        ]);
    }


    /**
     * @return \Google_Service_Sheets
     */
    public function createSheets()
    {
        return new \Google_Service_Sheets($this->googleClient);
    }
}
