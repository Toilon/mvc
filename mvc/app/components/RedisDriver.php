<?php

namespace ToilonShop\components;

use ToilonShop\config\Main;
use ToilonShop\components\CacheInterface;

class RedisDriver implements CacheInterface
{
    private $redis;

    public function __construct()
    {
        $config = Main::getConfig()['redis'];
        $this->redis = new \Redis();
        $this->redis->connect($config['host']);
    }

    public function setItem($key, $value, $ttl = -1)
    {
        $this->redis->set($key, $value, $ttl);
    }

    public function getItem($key)
    {
        return $this->redis->get($key);
    }

    public function deleteItem($key)
    {
        $this->redis->delete($key);
    }

    public function invalidateCache($pattern)
    {
        // TODO: Implement invalidateCache() method.
    }

    public function keyBuilder($prefix, $key)
    {
        return $prefix.":".$key;
    }

}