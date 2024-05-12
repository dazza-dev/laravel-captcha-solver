<?php

namespace LaravelCaptchaSolver\Capsolver;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV2ProxyLess extends Capsolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $pageAction;

    private $apiDomain;

    public function getPostData()
    {
        $postData = [
            'type' => 'ReCaptchaV2TaskProxyLess',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'isInvisible' => $this->isInvisible,
        ];

        if ($this->pageAction) {
            $postData['pageAction'] = $this->pageAction;
        }

        if ($this->apiDomain) {
            $postData['apiDomain'] = $this->apiDomain;
        }

        if ($this->userAgent) {
            $postData['userAgent'] = $this->userAgent;
        }

        if ($this->cookies) {
            $postData['cookies'] = $this->cookies;
        }

        return $postData;
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }

    public function setPageAction($value)
    {
        $this->pageAction = $value;
    }

    public function setApiDomain($value)
    {
        $this->apiDomain = $value;
    }
}
