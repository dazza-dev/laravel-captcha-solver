<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV3ProxyLess extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $pageAction;

    private $minScore;

    private $apiDomain;

    public function getPostData()
    {
        return [
            'type' => 'ReCaptchaV3TaskProxyLess',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'pageAction' => $this->pageAction,
            'minScore' => $this->minScore,
            'apiDomain' => $this->apiDomain,
            'userAgent' => $this->userAgent,
            'cookies' => $this->cookies,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }

    public function setPageAction($value)
    {
        $this->pageAction = $value;
    }

    public function setMinScore($value)
    {
        $this->minScore = $value;
    }

    public function setApiDomain($value)
    {
        $this->apiDomain = $value;
    }
}
