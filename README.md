# Laravel Captcha Solver

This package provides a simple and convenient way to solve captchas using different services.

## Supported Services

- `anticaptcha` - api.anti-captcha.com
- `capmonster` - api.capmonster.cloud
- `capsolver` - api.capsolver.com

## Installation

```bash
composer require dazza-dev/laravel-captcha-solver
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="DazzaDev\LaravelCaptchaSolver\CaptchaSolverServiceProvider" --tag=captcha-solver-config
```

Add environment variables to `.env`:

```env
CAPTCHA_SOLVER_SERVICE=anticaptcha   # or capmonster, capsolver
CAPTCHA_SOLVER_API_KEY=your-api-key-here
```

## Usage

### Using Facade

```php
use DazzaDev\LaravelCaptchaSolver\Facades\CaptchaSolver;

// Optional: set service and API key at runtime
CaptchaSolver::setService('capsolver')->setApiKey('your-api-key-here');

// Get balance
$balance = CaptchaSolver::getBalance();

// Solve reCaptcha V2
$solutionV2 = CaptchaSolver::solveReCaptchaV2('https://site.example', 'site-key-v2');

// Solve reCaptcha V3
$solutionV3 = CaptchaSolver::solveReCaptchaV3('https://site.example', 'site-key-v3');
```

### Dependency Injection

```php
use DazzaDev\LaravelCaptchaSolver\CaptchaSolverManager;

class ExampleController
{
    private CaptchaSolverManager $solver;

    public function __construct(CaptchaSolverManager $solver)
    {
        $this->solver = $solver;
    }

    public function solve(): string
    {
        // Optional: set service and API key at runtime
        $this->solver->setService('anticaptcha')->setApiKey('your-api-key-here');

        return $this->solver->solveReCaptchaV2('https://site.example', 'site-key-v2') ?? '';
    }
}
```

## Notes

- The provider auto-registers and reads `captcha-solver.php` config keys.
- Use the specific tag `captcha-solver-config` to publish only this package's config.

## Contributions

Contributions are welcome. If you find any bugs or have ideas for improvements, please open an issue or send a pull request. Make sure to follow the contribution guidelines.

## Author

Laravel Captcha Solver was created by [DAZZA](https://github.com/dazza-dev).

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
