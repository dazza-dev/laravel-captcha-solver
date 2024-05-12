<?php

namespace LaravelCaptchaSolver\Anticaptcha;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class GeeTestProxyless extends Anticaptcha implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $websiteChallenge;

    private $geetestApiServerSubdomain;

    public function getPostData()
    {
        $set = [
            'type' => 'GeeTestTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'geetestApiServerSubdomain' => $this->geetestApiServerSubdomain,
            'gt' => $this->websiteKey,
            'challenge' => $this->websiteChallenge,
        ];

        return $set;
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
}
