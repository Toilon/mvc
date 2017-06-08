<?php

namespace ToilonShop\models;

use \System\DB;
use ToilonShop\components\NotFoundException;

class Model
{
    private $db;

    public $keyField;

    public $tableName;

    /**
     * Model constructor.
     * @param $db
     */
    public function __construct()
    {
        $this->db = DB::get_instance();
    }


    public function getById($id)
    {
        $q = "select * from " . $this->tableName . " where " .
            $this->keyField . "  = ".  $id ;
        $result = $this->db->query($q);
        $array = $result->fetch();
        if (empty($array)) {
            throw new NotFoundException();
        }
        foreach ($array as $key=>$value)
        {
            $this->$key = $value;
        }


    }


}