<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class NoCaptcha extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $recaptchaDataSValue;

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
}
