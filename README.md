## Installation

You can install this package via Composer.

```bash
composer require dazza-dev/laravel-captcha-solver
```

## Configuration

```plaintext
CAPTCHA_SOLVER_API_KEY=your_captcha_solver_api_key
```

## Captcha Resolution

### reCaptcha Google with AntiCaptcha.com

```php
use LaravelCaptchaSolver\Anticaptcha\NoCaptchaProxyless;

public function solveReCaptcha(): mixed
{
    $solver = new NoCaptchaProxyless;
    $solver->setVerboseMode(false);
    $solver->setKey(env('CAPTCHA_SOLVER_API_KEY'));
    $solver->setWebsiteURL('https://targetdomain.com');
    $solver->setWebsiteKey('recaptcha_site_key');
    $solver->createTask();

    // Wait
    $solver->waitForResult();

    return $solver->getTaskSolution() ?? null;
}

```

## Contributions

Contributions are welcome. If you find any bugs or have ideas for improvements, please open an issue or send a pull request. Make sure to follow the contribution guidelines.

## Author

Multi-Tenant Sync was created by [DAZZA](https://github.com/adaza90).

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
