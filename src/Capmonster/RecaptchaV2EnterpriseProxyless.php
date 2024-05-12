<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV2EnterpriseProxyless extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $enterprisePayload;

    private $apiDomain;

    public function getPostData()
    {
        return [
            'type' => 'RecaptchaV2EnterpriseTaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'enterprisePayload' => $this->enterprisePayload,
            'apiDomain' => $this->apiDomain,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
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
