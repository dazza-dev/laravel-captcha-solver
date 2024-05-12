<?php

namespace DazzaDev\LaravelCaptchaSolver\Tasks;

use DazzaDev\LaravelCaptchaSolver\CaptchaSolver;
use DazzaDev\LaravelCaptchaSolver\CaptchaTaskProtocol;
use DazzaDev\LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use DazzaDev\LaravelCaptchaSolver\Traits\ProxyTrait;

class GeeTest extends CaptchaSolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $challenge;

    private $captchaId;

    private $geetestGetLib;

    private $version = 3;

    private $initParameters;

    public function getPostData()
    {
        $postData = [
            'type' => ($this->proxyAddress) ? 'GeeTestTask' : 'GeeTestTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'gt' => $this->websiteKey,
            'challenge' => $this->challenge,
        ];

        if ($this->captchaId) {
            $postData['captchaId'] = $this->captchaId;
        }

        if ($this->apiSubdomain) {
            $postData['geetestApiServerSubdomain'] = $this->apiSubdomain;
        }

        if ($this->geetestGetLib) {
            $postData['geetestGetLib'] = $this->geetestGetLib;
        }

        if ($this->version) {
            $postData['version'] = $this->version;
        }

        if ($this->initParameters) {
            $postData['initParameters'] = $this->initParameters;
        }

        if ($this->proxy) {
            $postData['proxy'] = $this->proxy;
        }

        if ($this->proxyType) {
            $postData['proxyType'] = $this->proxyType;
        }

        if ($this->proxyAddress) {
            $postData['proxyAddress'] = $this->proxyAddress;
        }

        if ($this->proxyPort) {
            $postData['proxyPort'] = $this->proxyPort;
        }

        if ($this->proxyLogin) {
            $postData['proxyLogin'] = $this->proxyLogin;
        }

        if ($this->proxyPassword) {
            $postData['proxyPassword'] = $this->proxyPassword;
        }

        if ($this->userAgent) {
            $postData['userAgent'] = $this->userAgent;
        }

        if ($this->cookies) {
            $postData['cookies'] = $this->cookies;
        }

        return $postData;
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution;
    }

    public function setChallenge($value)
    {
        $this->challenge = $value;
    }

    public function setCaptchaId($value)
    {
        $this->captchaId = $value;
    }

    public function setGeetestGetLib($value)
    {
        $this->geetestGetLib = $value;
    }

    public function setVersion($value)
    {
        $this->version = $value;
    }

    public function setInitParameters($value)
    {
        $this->initParameters = $value;
    }
}
