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
        $postData = [
            'type' => ($this->proxyAddress) ? 'FunCaptchaTask' : 'FunCaptchaTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'funcaptchaApiJSSubdomain' => $this->jsSubdomain,
            'websitePublicKey' => $this->websiteKey,
        ];

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
        return $this->taskInfo->solution->token;
    }
}
