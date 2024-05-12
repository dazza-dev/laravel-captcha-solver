<?php

namespace LaravelCaptchaSolver\Anticaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class FunCaptchaProxyless extends Anticaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $jsSubdomain;

    public function getPostData()
    {
        return [
            'type' => 'FunCaptchaTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'funcaptchaApiJSSubdomain' => $this->jsSubdomain,
            'websitePublicKey' => $this->websiteKey,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->token;
    }

    public function setJSSubdomain($value)
    {
        $this->jsSubdomain = $value;
    }
}
