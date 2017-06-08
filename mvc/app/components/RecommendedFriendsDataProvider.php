<?php

namespace ToilonShop\components;

use ToilonShop\components\CacheProvider;

class RecommendedFriendsDataProvider
{
    const FRIENDS_PREFIX = 'recomendedfriends';

    private $cacheProvider;

    public function __construct()
    {
        $this->cacheProvider = (new CacheProvider())->getProvider();
    }

    public function setFriends($userId, array $friendsList, $ttl=0)
    {
        $this->cacheProvider->setItem(
            $this->cacheProvider->keyBuilder(self::FRIENDS_PREFIX, $userId),
            json_encode($friendsList),
            $ttl
        );
    }

    public function getFriends($userId)
    {
       return json_decode($this->cacheProvider->getItem(
            $this->cacheProvider->keyBuilder(self::FRIENDS_PREFIX, $userId)
        ));
    }


}