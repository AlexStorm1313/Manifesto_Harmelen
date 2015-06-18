<?php
return [
    'driver' => 'eloquent',
    'model' => 'Manifesto\User',
    'table' => 'users',
    'password' => [
        'email' => 'emails.password',
        'table' => 'password_resets',
        'expire' => 60,
    ],
];