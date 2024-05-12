<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class GeeTest extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $websiteChallenge;

    private $geetestApiServerSubdomain;

    private $geetestGetLib;

    private $version = 3;

    private $initParameters;

    public function getPostData()
    {
        return [
            'type' => 'GeeTestTask',
            'websiteURL' => $this->websiteUrl,
            'gt' => $this->websiteKey,
            'challenge' => $this->websiteChallenge,
            'geetestApiServerSubdomain' => $this->geetestApiServerSubdomain,
            'geetestGetLib' => $this->geetestGetLib,
            'version' => $this->version,
            'initParameters' => $this->initParameters,
            'proxyType' => $this->proxyType,
            'proxyAddress' => $this->proxyAddress,
            'proxyPort' => $this->proxyPort,
            'proxyLogin' => $this->proxyLogin,
            'proxyPassword' => $this->proxyPassword,
            'userAgent' => $this->userAgent,
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

    public function setGeetestGetLib($value)
    {
        $this->geetestGetLib = $value;
    }

    public function setVersion($value)
    {
        $this->version = $value;
    }

    public function setInitParameters($value)
    {
        $this->initParameters = $value;
    }
}
