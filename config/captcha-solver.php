<?php

return [
    'captcha_solver_service' => env('CAPTCHA_SOLVER_SERVICE', ''),
    'captcha_solver_api_key' => env('CAPTCHA_SOLVER_API_KEY', ''),
    'endpoints' => [
        'anti_captcha' => 'api.anti-captcha.com',
        'any_captcha' => 'api.anycaptcha.com',
        'cap_monster' => 'api.capmonster.cloud',
        'cap_solver' => 'api.capsolver.com',
    ],
];
