

<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],
        'db' => [
            'driver' => 'sqlsrv',
            'host' => '172.16.80.50\MAINSQLB',
            'database' => 'RoadTwentyFourSeven',
            'username' => 'sa',
            'password' => 'k!p@ny52',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
		'db2' => [
			'driver' => 'mysql',
			'host' => '172.16.82.1',
			'database' => 'asterisk',
			'username' => 'cron',
			'password' => '1234',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
		],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
