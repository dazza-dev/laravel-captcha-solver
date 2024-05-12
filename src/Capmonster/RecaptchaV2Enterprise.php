<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class RecaptchaV2Enterprise extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $enterprisePayload;

    private $apiDomain;

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
}
