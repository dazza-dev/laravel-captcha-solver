<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class FunCaptchaProxyLess extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $funcaptchaApiJSSubdomain;

    private $data;

    private $proxy;

    public function getPostData()
    {
        return [
            'type' => 'FunCaptchaTaskProxyLess',
            'websiteURL' => $this->websiteUrl,
            'websitePublicKey' => $this->websiteKey,
            'funcaptchaApiJSSubdomain' => $this->funcaptchaApiJSSubdomain,
            'data' => $this->data,
            'proxy' => $this->proxy,
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

    public function setProxy($value)
    {
        $this->proxy = $value;
    }
}
