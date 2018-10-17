<?php
require __DIR__ . '/vendor/autoload.php';

$db = include __DIR__ . '/config/database.php';
        
return [
    'paths' => [
        'migrations' => [
            __DIR__ . '/database/migrations'
        ],
        'seeds' => [
            __DIR__ . '/database/seeds'
        ]
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => $db['dev']['driver'],
            'host' => $db['dev']['host'],
            'name' => $db['dev']['database'],
            'user' => $db['dev']['user'],
            'pass' => $db['dev']['pass'],
            'charset' => $db['dev']['charset'],
            'collation' => $db['dev']['collation']
        ]
    ]
];
