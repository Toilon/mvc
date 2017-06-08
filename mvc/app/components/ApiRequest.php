<?php

namespace ToilonShop\components;
use ToilonShop\config\Main;

class ApiRequest
{
    private $handler;

    /**
     * @return mixed
     */
    public function getHandler()
    {
        if (!$this->handler) {
            $config = Main::getConfig()['di'];
            $this->handler = new $config['api_handler'];

        }
        return $this->handler;
    }

    /**
     * @param CacheInterface $provider
     */
    public function setHandler($provider)
    {
        $this->handler = $provider;
    }


}