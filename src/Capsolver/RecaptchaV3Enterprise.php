<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;

class RecaptchaV3Enterprise extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $pageAction;

    private $enterprisePayload;

    private $minScore;

    private $apiDomain;

    public function getPostData()
    {
        return [
            'type' => 'ReCaptchaV3EnterpriseTask',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'proxy' => $this->proxy,
            'pageAction' => $this->pageAction,
            'enterprisePayload' => $this->enterprisePayload,
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

    public function setEnterprisePayload($value)
    {
        $this->enterprisePayload = $value;
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
