<?php

namespace DazzaDev\LaravelCaptchaSolver;

use DazzaDev\CaptchaSolver\CaptchaSolverClient;
use DazzaDev\CaptchaSolver\Exceptions\CaptchaSolverException;

class CaptchaSolverManager
{
    private CaptchaSolverClient $client;

    /**
     * Initialize the manager with service and API key
     */
    public function __construct(?string $service = null, ?string $apiKey = null)
    {
        $this->client = new CaptchaSolverClient($service, $apiKey);
    }

    /**
     * Set the captcha service to use
     */
    public function setService(string $service): self
    {
        $this->client->setService($service);

        return $this;
    }

    /**
     * Set the API key for the captcha service
     */
    public function setApiKey(string $apiKey): self
    {
        $this->client->setApiKey($apiKey);

        return $this;
    }

    /**
     * Get account balance
     *
     * @throws CaptchaSolverException
     */
    public function getBalance(): float
    {
        return $this->client->getBalance();
    }

    /**
     * Solve reCAPTCHA v2
     *
     * @throws CaptchaSolverException
     */
    public function solveReCaptchaV2(string $websiteUrl, string $websiteKey): ?string
    {
        return $this->client->solveReCaptchaV2($websiteUrl, $websiteKey);
    }

    /**
     * Solve reCAPTCHA v3
     *
     * @throws CaptchaSolverException
     */
    public function solveReCaptchaV3(string $websiteUrl, string $websiteKey): ?string
    {
        return $this->client->solveReCaptchaV3($websiteUrl, $websiteKey);
    }
}
