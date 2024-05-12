<?php

namespace DazzaDev\LaravelCaptchaSolver\Tasks;

use DazzaDev\LaravelCaptchaSolver\CaptchaSolver;
use DazzaDev\LaravelCaptchaSolver\CaptchaTaskProtocol;
use DazzaDev\LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use DazzaDev\LaravelCaptchaSolver\Traits\ProxyTrait;

class Turnstile extends CaptchaSolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    public function getPostData()
    {
        $postData = [
            'type' => ($this->proxyAddress) ? 'TurnstileTask' : 'TurnstileTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
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

        return $postData;
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->token;
    }
}
