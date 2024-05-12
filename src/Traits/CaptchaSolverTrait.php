<?php

namespace LaravelCaptchaSolver\Traits;

trait CaptchaSolverTrait
{
    private $taskInfo;

    private $websiteUrl;

    private $websiteKey;

    private $isInvisible = false;

    private $userAgent = '';

    private $cookies = '';

    public function setTaskInfo($taskInfo)
    {
        $this->taskInfo = $taskInfo;
    }

    public function setWebsiteURL($value)
    {
        $this->websiteUrl = $value;
    }

    public function setWebsiteKey($value)
    {
        $this->websiteKey = $value;
    }

    public function setIsInvisible($value)
    {
        $this->isInvisible = $value;
    }

    public function setUserAgent($value)
    {
        $this->userAgent = $value;
    }

    public function setCookies($value)
    {
        $this->cookies = $value;
    }
}
