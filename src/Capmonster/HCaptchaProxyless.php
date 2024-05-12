<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class HCaptchaProxyless extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $data;

    public function getPostData()
    {
        return [
            'type' => 'HCaptchaTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'isInvisible' => $this->isInvisible,
            'data' => $this->data,
            'cookies' => $this->cookies,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->token;
    }

    public function setData($value)
    {
        $this->data = $value;
    }
}
