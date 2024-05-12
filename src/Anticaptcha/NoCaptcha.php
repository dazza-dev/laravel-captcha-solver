<?php

namespace LaravelCaptchaSolver\Anticaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class NoCaptcha extends Anticaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $websiteSToken;

    private $proxyType = 'http';

    private $proxyAddress;

    private $proxyPort;

    private $proxyLogin;

    private $proxyPassword;

    public function getPostData()
    {
        return [
            'type' => 'NoCaptchaTask',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'websiteSToken' => $this->websiteSToken,
            'proxyType' => $this->proxyType,
            'proxyAddress' => $this->proxyAddress,
            'proxyPort' => $this->proxyPort,
            'proxyLogin' => $this->proxyLogin,
            'proxyPassword' => $this->proxyPassword,
            'userAgent' => $this->userAgent,
            'cookies' => $this->cookies,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }

    public function setWebsiteSToken($value)
    {
        $this->websiteSToken = $value;
    }

    public function setProxyType($value)
    {
        $this->proxyType = $value;
    }

    public function setProxyAddress($value)
    {
        $this->proxyAddress = $value;
    }

    public function setProxyPort($value)
    {
        $this->proxyPort = $value;
    }

    public function setProxyLogin($value)
    {
        $this->proxyLogin = $value;
    }

    public function setProxyPassword($value)
    {
        $this->proxyPassword = $value;
    }
}
