<?php

namespace ToilonShop\config;

class Main
{
    public function getConfig()
    {
        return [
            'common' => [
                'base_url' => '/form/mvc/'
            ],
            'database' => [
                'user' => 'root',
                'password' => '',
                'db' => 'shop',
                'host' => 'localhost',
                'driver' => 'mysqli'
            ],
            'redis' => [
                'host' => 'localhost',
                'default_db' => 0
            ],
            'di' =>
            [
                'cacheDriver' => 'ToilonShop\\components\\RedisDriver',
                'api_handler' => 'ToilonShop\\components\\curlDriver',
            ],
            'apis' =>
            [
                'weatherApi' => 'http://samples.openweathermap.org/data/2.5/weather?lat=35&lon=139&appid=b1b15e88fa797225412429c1c50c122a1'
            ]
        ];
    }

}