<?php

namespace DazzaDev\LaravelCaptchaSolver;

use Illuminate\Support\ServiceProvider;

class CaptchaSolverServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/captcha-solver.php', 'captcha-solver');

        $this->app->singleton(CaptchaSolverManager::class, function ($app): CaptchaSolverManager {
            $config = $app['config'];
            $service = (string) $config->get('captcha-solver.captcha_solver_service');
            $apiKey = (string) $config->get('captcha-solver.captcha_solver_api_key');

            return new CaptchaSolverManager($service, $apiKey);
        });

        $this->app->alias(CaptchaSolverManager::class, 'captcha-solver');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/captcha-solver.php' => config_path('captcha-solver.php'),
        ], 'captcha-solver-config');
    }
}
