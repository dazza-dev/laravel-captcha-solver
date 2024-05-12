<?php

namespace LaravelCaptchaSolver\Anticaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class FunCaptcha extends Anticaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $jsSubdomain;

    public function getPostData()
    {
        return [
            'type' => 'FunCaptchaTask',
            'websiteURL' => $this->websiteUrl,
            'funcaptchaApiJSSubdomain' => $this->jsSubdomain,
            'websitePublicKey' => $this->websiteKey,
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
}
