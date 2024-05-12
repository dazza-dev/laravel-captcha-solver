<?php

namespace LaravelCaptchaSolver\Capmonster;

use LaravelCaptchaSolver\CaptchaTaskProtocol;
use LaravelCaptchaSolver\Traits\CaptchaSolverTrait;

class RecaptchaV3 extends Capmonster implements CaptchaTaskProtocol
{
    use CaptchaSolverTrait;

    private $minScore;

    private $pageAction;

    public function getPostData()
    {
        return [
            'type' => 'RecaptchaV3TaskProxyless',
            'websiteURL' => $this->websiteUrl,
            'websiteKey' => $this->websiteKey,
            'minScore' => $this->minScore,
            'pageAction' => $this->pageAction,
        ];
    }

    public function getTaskSolution()
    {
        return $this->taskInfo->solution->gRecaptchaResponse;
    }

    public function setMinScore($value)
    {
        $this->minScore = $value;
    }

    public function setPageAction($value)
    {
        $this->pageAction = $value;
    }
}
