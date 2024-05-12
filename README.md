## Installation

You can install this package via Composer.

```bash
composer require dazza-dev/laravel-captcha-solver
```

## Configuration

```plaintext
CAPTCHA_SOLVER_SERVICE=your_captcha_solver_service (anti_captcha, any_captcha, cap_monster, cap_solver)
CAPTCHA_SOLVER_API_KEY=your_captcha_solver_api_key
```

## Captcha Resolution

### reCaptcha Google with AntiCaptcha.com

```php
use DazzaDev\LaravelCaptchaSolver\CaptchaSolverClient;

public function solveReCaptcha(): mixed
{
    $solver = new CaptchaSolverClient();

    return $solver->solveReCaptchaV2('websiteUrl', 'websiteKey');
}
```

Or

```php
public function solveReCaptcha(): mixed
{
    return app('captcha_solver')->solveReCaptchaV2('websiteUrl', 'websiteKey');
}
```

## Contributions

Contributions are welcome. If you find any bugs or have ideas for improvements, please open an issue or send a pull request. Make sure to follow the contribution guidelines.

## Author

Laravel Captcha Solver was created by [DAZZA](https://github.com/adaza90).

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
