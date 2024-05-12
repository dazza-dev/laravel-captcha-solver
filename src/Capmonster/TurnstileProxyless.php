<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class TurnstileProxyless extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    public function getPostData()
    {
        return [
            'type' => 'TurnstileTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->token;
    }
}
