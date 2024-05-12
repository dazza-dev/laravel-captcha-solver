<?php

namespace LaravelCaptchaSolver\Anticaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class NoCaptchaProxyless extends Anticaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $websiteSToken;

    public function getPostData()
    {
        return [
            'type' => 'NoCaptchaTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'websiteSToken' => $this->websiteSToken,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }

    public function setWebsiteSToken($value)
    {
        $this->websiteSToken = $value;
    }
}
