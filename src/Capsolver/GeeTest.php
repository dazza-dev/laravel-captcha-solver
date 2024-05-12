<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class GeeTest extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $challenge;

    private $geetestApiServerSubdomain;

    private $captchaId;

    public function getPostData()
    {
        $postData = [
            'websiteURL' => $this->websiteUrl,
            'gt' => $this->websiteKey,
            'challenge' => $this->challenge,
            'captchaId' => $this->captchaId,
            'geetestApiServerSubdomain' => $this->geetestApiServerSubdomain,
        ];

        if (!empty($this->proxy)) {
            $postData['type'] = 'GeeTestTask';
            $postData['proxy'] = $this->proxy;
        } else {
            $postData['type'] = 'GeeTestTaskProxyLess';
        }

        return $postData;
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
