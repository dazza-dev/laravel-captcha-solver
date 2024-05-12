<?php

namespace DazzaDev\LaravelCaptchaSolver;

interface CaptchaTaskProtocol
{
    public function getPostData();

    public function getTaskSolution();
}
