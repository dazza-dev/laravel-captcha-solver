<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV2EnterpriseProxyLess extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $pageAction;

    private $enterprisePayload;

    private $apiDomain;

    public function getPostData()
    {
        return [
            'type' => 'ReCaptchaV2EnterpriseTaskProxyLess',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'pageAction' => $this->pageAction,
            'enterprisePayload' => $this->enterprisePayload,
            'isInvisible' => $this->isInvisible,
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

    public function setApiDomain($value)
    {
        $this->apiDomain = $value;
    }
}
