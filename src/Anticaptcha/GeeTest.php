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
        return [
            'type' => 'GeeTestTask',
            'websiteURL' => $this->websiteUrl,
            'geetestApiServerSubdomain' => $this->geetestApiServerSubdomain,
            'gt' => $this->websiteKey,
            'challenge' => $this->websiteChallenge,
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
