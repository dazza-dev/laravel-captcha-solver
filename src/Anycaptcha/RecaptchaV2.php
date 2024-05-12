<?php

namespace LaravelCaptchaSolver\Anycaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV2 extends Anycaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    public function getPostData()
    {
        return [
            'type' => 'RecaptchaV2TaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'isInvisible' => $this->isInvisible,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }
}
