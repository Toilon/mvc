<?php

namespace ToilonShop\components;
use ToilonShop\config\Main;


class WeatherDataProvider
{
    private $handler;

    public function __construct()
    {
        $this->handler = (new ApiRequest())->getHandler();
    }


    public function getWeather()
    {
        $config = Main::getConfig()['apis'];
        $this->handler->setUrl($config['weatherApi']);
        $response = $this->handler->getResponse();

        return json_decode($response);
    }

}