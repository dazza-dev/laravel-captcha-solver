<?php

namespace LaravelCaptchaSolver\Anticaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class GeeTest extends Anticaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $websiteChallenge;

    private $geetestApiServerSubdomain;

    public function getPostData()
    {
        $postData = [
            'type' => ($this->proxyAddress) ? 'GeeTestTask' : 'GeeTestTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'geetestApiServerSubdomain' => $this->geetestApiServerSubdomain,
            'gt' => $this->websiteKey,
            'challenge' => $this->websiteChallenge,
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
        return $this->taskInfo->solution;
    }

    public function setChallenge($value)
    {
        $this->websiteChallenge = $value;
    }

    public function setAPISubdomain($value)
    {
        $this->geetestApiServerSubdomain = $value;
    }
}
