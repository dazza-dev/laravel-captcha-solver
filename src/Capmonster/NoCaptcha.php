<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class NoCaptcha extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $recaptchaDataSValue;

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
            'recaptchaDataSValue' => $this->recaptchaDataSValue,
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

    public function setRecaptchaDataSValue($value)
    {
        $this->recaptchaDataSValue = $value;
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
