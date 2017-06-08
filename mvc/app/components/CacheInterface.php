<?php

namespace ToilonShop\components;

interface CacheInterface
{
    public function setItem($key, $value, $ttl);
    public function getItem($key);
    public function deleteItem($key);
    public function invalidateCache($pattern);
}