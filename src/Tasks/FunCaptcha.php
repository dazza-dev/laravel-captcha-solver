<?php

namespace DazzaDev\LaravelCaptchaSolver\Tasks;

use DazzaDev\LaravelCaptchaSolver\CaptchaSolver;
use DazzaDev\LaravelCaptchaSolver\CaptchaTaskProtocol;
use DazzaDev\LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use DazzaDev\LaravelCaptchaSolver\Traits\ProxyTrait;

class FunCaptcha extends CaptchaSolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    public function getPostData()
    {
        $postData = [
            'type' => ($this->proxyAddress) ? 'FunCaptchaTask' : 'FunCaptchaTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websitePublicKey' => $this->websiteKey,
        ];

        if ($this->apiSubdomain) {
            $postData['funcaptchaApiJSSubdomain'] = $this->apiSubdomain;
        }

        if ($this->data) {
            $postData['data'] = $this->data;
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
        return $this->taskInfo->solution->token;
    }
}
