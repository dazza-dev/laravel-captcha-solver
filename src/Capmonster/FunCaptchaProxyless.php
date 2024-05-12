<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class FunCaptchaProxyless extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $funcaptchaApiJSSubdomain;

    private $data;

    public function getPostData()
    {
        return [
            'type' => 'NoCaptchaTask',
            'websiteURL' => $this->websiteUrl,
            'websitePublicKey' => $this->websiteKey,
            'funcaptchaApiJSSubdomain' => $this->funcaptchaApiJSSubdomain,
            'data' => $this->data,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->token;
    }

    public function setFuncaptchaApiJSSubdomain($value)
    {
        $this->funcaptchaApiJSSubdomain = $value;
    }

    public function setData($value)
    {
        $this->data = $value;
    }
}
