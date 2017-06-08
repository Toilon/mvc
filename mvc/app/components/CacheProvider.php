<?php

namespace ToilonShop\components;
use ToilonShop\config\Main;

class CacheProvider
{
    private $provider;

    /**
     * @return mixed
     */
    public function getProvider()
    {
        if (!$this->provider) {
            $config = Main::getConfig()['di'];
            $this->provider = new $config['cacheDriver'];

        }
        return $this->provider;
    }

    /**
     * @param CacheInterface $provider
     */
    public function setProvider(CacheInterface $provider)
    {
        $this->provider = $provider;
    }


}