<?php
// require_once 'vendor/autoload.php';
// require_once __DIR__ . '/vendor/autoload.php';
require_once 'class-db.php';
  
define('GOOGLE_CLIENT_ID', '801263264245-fi6jec4ugvj0124j6g03cu1kjdorp00k.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
  
$config = [
    'callback' => 'http://localhost/DE/website/temp.php',
    'keys'     => [
                    'id' => GOOGLE_CLIENT_ID,
                    'secret' => GOOGLE_CLIENT_SECRET
                ],
    'scope'    => 'https://mail.google.com',
    'authorize_url_parameters' => [
            'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            'access_type' => 'offline'
    ]
];
  
$adapter = new Hybridauth\Provider\Google( $config );