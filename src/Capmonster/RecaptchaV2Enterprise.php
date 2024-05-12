<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV2Enterprise extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $enterprisePayload;

    private $apiDomain;

    private $proxyType = 'http';

    private $proxyAddress;

    private $proxyPort;

    private $proxyLogin;

    private $proxyPassword;

    public function getPostData()
    {
        return [
            'type' => 'RecaptchaV2EnterpriseTask',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'enterprisePayload' => $this->enterprisePayload,
            'apiDomain' => $this->apiDomain,
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

    public function setEnterprisePayload($value)
    {
        $this->enterprisePayload = $value;
    }

    public function setApiDomain($value)
    {
        $this->apiDomain = $value;
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
