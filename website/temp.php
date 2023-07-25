<?php

require __DIR__ . 'vendor\autoload.php';

// Replace with your own values
$to = 'recipient@example.com';
$subject = 'Test email';
$message = 'This is a test email sent using the Gmail API';

// Create a new Gmail client
$client = new Google_Client();
$client->setApplicationName('Gmail API PHP Send Email');
$client->setScopes([
    'https://www.googleapis.com/auth/gmail.compose',
    'https://www.googleapis.com/auth/gmail.modify',
]);
$client->setAuthConfig('path/to/client_secret.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

// Authorize the client with the user's credentials
$accessToken = 'user-access-token';
$client->setAccessToken($accessToken);

if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    file_put_contents('path/to/accessToken.json', json_encode($client->getAccessToken()));
}

// Create a new Gmail message
$message = new Google_Service_Gmail_Message();
$body = new Google_Service_Gmail_MessagePart();
$body->setData(base64_encode($message));
$body->setMimeType('text/plain');
$message->setRaw($body);

// Send the message
$service = new Google_Service_Gmail($client);
try {
    $message = $service->users_messages->send('me', $message);
    echo 'Message Id: ' . $message->getId();
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}

?>
