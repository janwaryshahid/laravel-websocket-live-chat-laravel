<h1>Real Time Laravel Chat group using laravel websocket (live chat system) </h1>

<h4>Getting start</h4>
<ul>
    <li>Composer install</li>
    <li>npm install</li>
    <li>php artisan migrate</li>
    <li>npm run dev</li>
    <li>php artisan serve</li>
    <li>php artisan websockets:run</li>
</ul>

config/broadcast.php

'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'host' => '127.0.0.1',
                'port' => 6001,
                'scheme' => 'http',
                'useTLS' => true,
            ],
            'client_options' => [
                // Guzzle client options: https://docs.guzzlephp.org/en/stable/request-options.html
            ],
        ],
