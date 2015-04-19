<?php
namespace Model;

use Model\Manager;

class Eloquent
{
    static public function init()
    {
        Manager::getInstance()->init();
    }

    static public function getConnection()
    {
        return Manager::getInstance()->getConnection();
    }
}
