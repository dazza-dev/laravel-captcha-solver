<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class NoCaptchaProxyless extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $recaptchaDataSValue;

    public function getPostData()
    {
        $postData = [
            'type' => 'NoCaptchaTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
        ];

        if ($this->recaptchaDataSValue) {
            $postData['recaptchaDataSValue'] = $this->recaptchaDataSValue;
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
        return $this->taskInfo->solution->gRecaptchaResponse;
    }

    public function setRecaptchaDataSValue($value)
    {
        $this->recaptchaDataSValue = $value;
    }
}
