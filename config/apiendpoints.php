<?php

return [
    'gateway' => env('GATEWAY_API_URL', 'http://duluin-hris-account.test/api'),
    'sso' => env('API_GATEWAY_SERVER', 'http://duluin-hris-account.test/api'),
    'employees' => env('API_EMPLOYEE_SERVER', 'http://localhost:4444/api/v1'),
    'companies' => env('API_COMPANY_SERVER', 'http://localhost:5555/api/v1'),
];
