<?php
declare(strict_types=1);
/**
 * @author Juraj Surman <jsurman@pixelfederation.com.sk>
 */

namespace PixelFederation\GoogleApi;

/**
 *
 */
final class Configuration
{
    /**
     * @var string
     */
    private $developerKey = '';

    /**
     * @var string[]|null
     */
    private $scopes;

    /**
     * @var string|null
     */
    private $authConfigFile;

    /**
     * @param null|string $developerKey
     */
    public function setDeveloperKey(string $developerKey): void
    {
        $this->developerKey = $developerKey;
    }

    /**
     * @param string[] $scopes
     */
    public function setScopes(array $scopes): void
    {
        $this->scopes = $scopes;
    }

    /**
     * @param string $authConfigFile
     */
    public function setAuthConfigFile(string $authConfigFile): void
    {
        $this->authConfigFile = $authConfigFile;
    }

    /**
     * @return string
     */
    public function getDeveloperKey(): string
    {
        return $this->developerKey;
    }

    /**
     * @return null|string[]
     */
    public function getScopes(): ?array
    {
        return $this->scopes;
    }

    /**
     * @return null|string
     */
    public function getAuthConfigFile(): ?string
    {
        return $this->authConfigFile;
    }

}
