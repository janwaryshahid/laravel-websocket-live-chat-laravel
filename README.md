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
<br>
'pusher' => [<br>
            'driver' => 'pusher',<br>
            'key' => env('PUSHER_APP_KEY'),<br>
            'secret' => env('PUSHER_APP_SECRET'),<br>
            'app_id' => env('PUSHER_APP_ID'),<br>
            'options' => [<br>
                'cluster' => env('PUSHER_APP_CLUSTER'),<br>
                'host' => '127.0.0.1', <br>
                'port' => 6001, <br>
                'scheme' => 'http', <br>
                'useTLS' => true, <br>
            ],<br>
            'client_options' => [<br>
               
            ],<br>
        ],<br>
