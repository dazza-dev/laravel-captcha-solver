<?php

namespace DazzaDev\LaravelCaptchaSolver\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static float getBalance()
 * @method static ?string solveReCaptchaV2(string $websiteUrl, string $websiteKey)
 * @method static ?string solveReCaptchaV3(string $websiteUrl, string $websiteKey)
 * @method static \DazzaDev\LaravelCaptchaSolver\CaptchaSolverManager setService(string $service)
 * @method static \DazzaDev\LaravelCaptchaSolver\CaptchaSolverManager setApiKey(string $apiKey)
 */
class CaptchaSolver extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'captcha-solver';
    }
}
