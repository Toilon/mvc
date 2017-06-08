<?php

namespace ToilonShop\controllers;

use ToilonShop\components\NotFoundException;
use ToilonShop\controllers\BaseController;
use ToilonShop\components\RecommendedFriendsDataProvider;
use ToilonShop\components\WeatherDataProvider;

class ItemController extends BaseController
{

    private $friendDataProvider;
    private $WeatherDataProvider;

    /**
     * @return mixed
     */
    public function getWeatherDataProvider()
    {
        if (!$this->WeatherDataProvider) {
            $this->WeatherDataProvider = new WeatherDataProvider();
    }
        return $this->WeatherDataProvider;
    }

    /**
     * @param mixed $WeatherDataProvider
     */
    public function setWeatherDataProvider($WeatherDataProvider)
    {
        $this->WeatherDataProvider = $WeatherDataProvider;
    }

    /**
     * @return mixed
     */
    public function getFriendDataProvider()
    {
        if (!$this->friendDataProvider) {
            $this->friendDataProvider = new RecommendedFriendsDataProvider();
        }
        return $this->friendDataProvider;
    }

    /**
     * @param mixed $friendDataProvider
     */
    public function setFriendDataProvider($friendDataProvider)
    {
        $this->friendDataProvider = $friendDataProvider;
    }



    public function actionGetItemById()
    {
       /* $this->setModel('items', "\\ToilonShop\\models\\ItemsModel");
        $model = $this->getModel('items');
        try {
            $model->getById($this->getParam('id'));
            $this->sendWebResponse(['items/main'], $model->toArray(), true);
        } catch (NotFoundException $e) {
            $this->sendWebResponse(['items/error'], [], true);
        }
           */


      if( !($weather  = ($this->getFriendDataProvider()->getFriends("weather")))) {
          $weather = $this->getWeatherDataProvider()->getWeather();
          $this->getFriendDataProvider()->setFriends("weather", [$weather], 5);

      }
print_r($weather);
    }

    public function actionDelete()
    {

    }

}