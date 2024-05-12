<?php

namespace LaravelCaptchaSolver\Tasks;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;
use LaravelCaptchaSolver\Traits\ProxyTrait;
use LaravelCaptchaSolver\CaptchaSolver;

class RecaptchaV2 extends CaptchaSolver implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait, ProxyTrait;

    private $pageAction;

    private $apiDomain;

    public function getPostData()
    {
        $postData = [
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'isInvisible' => $this->isInvisible,
        ];

        if (!empty($this->proxy)) {
            $postData['type'] = 'ReCaptchaV2Task';
            $postData['proxy'] = $this->proxy;
        } else {
            $postData['type'] = 'ReCaptchaV2TaskProxyLess';
        }

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
