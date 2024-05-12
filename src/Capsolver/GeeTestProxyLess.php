<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class GeeTestProxyLess extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $challenge;

    private $geetestApiServerSubdomain;

    private $captchaId;

    public function getPostData()
    {
        return [
            'type' => 'GeeTestTaskProxyLess',
            'websiteURL' => $this->websiteUrl,
            'gt' => $this->websiteKey,
            'challenge' => $this->challenge,
            'captchaId' => $this->captchaId,
            'geetestApiServerSubdomain' => $this->geetestApiServerSubdomain,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution;
    }

    public function setChallenge($value)
    {
        $this->challenge = $value;
    }

    public function setCaptchaId($value)
    {
        $this->captchaId = $value;
    }

    public function setAPISubdomain($value)
    {
        $this->geetestApiServerSubdomain = $value;
    }
}
