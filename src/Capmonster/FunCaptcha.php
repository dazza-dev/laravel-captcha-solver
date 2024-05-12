<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class FunCaptcha extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $funcaptchaApiJSSubdomain;

    private $data;

    public function getPostData()
    {
        return [
            'type' => 'NoCaptchaTask',
            'websiteURL' => $this->websiteUrl,
            'websitePublicKey' => $this->websiteKey,
            'funcaptchaApiJSSubdomain' => $this->funcaptchaApiJSSubdomain,
            'data' => $this->data,
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
        return $this->taskInfo->solution->token;
    }

    public function setFuncaptchaApiJSSubdomain($value)
    {
        $this->funcaptchaApiJSSubdomain = $value;
    }

    public function setData($value)
    {
        $this->data = $value;
    }
}
