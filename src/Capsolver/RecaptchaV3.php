<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV3 extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $proxy;

    private $pageAction;

    private $minScore;

    private $apiDomain;

    public function getPostData()
    {
        return [
            'type' => 'ReCaptchaV3Task',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'proxy' => $this->proxy,
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

    public function setProxy($value)
    {
        $this->proxy = $value;
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
