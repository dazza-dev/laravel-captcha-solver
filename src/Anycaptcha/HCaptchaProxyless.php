<?php

namespace LaravelCaptchaSolver\Anycaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class HCaptchaProxyless extends Anycaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    public function getPostData()
    {
        return [
            'type' => 'FunCaptchaTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }
}
