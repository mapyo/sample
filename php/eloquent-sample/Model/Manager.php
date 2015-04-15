<?php
namespace Model;

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Events\Dispatcher;
use \Illuminate\Container\Container;
use Noodlehaus\Config;

class Manager
{

    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    protected function __construct()
    {
    }

    public function init()
    {
        static $eloquent = null;
        if (null !== $eloquent) {
            return;
        }

        $conf = Config::load('./config/database.yml');
        $eloquent = new Capsule;
        // 更新の時はmaster, 参照の時はslaveに自動的に切り替わる
        $eloquent->addConnection(array(
            'driver'    => 'mysql',
            'write' => array(
                'host'  => $conf['master_host'],
             ),
            'read' => array(
                'host'  => $conf['slave_host'],
             ),
            'database'  => $conf['database'],
            'username'  => $conf['username'],
            'password'  => $conf['password'],
            'port'      => $conf['port'],
            'prefix'    => '',
            'charset'   => $conf['charset'],
        ));
        $eloquent->setEventDispatcher(new Dispatcher(new Container));
        $eloquent->setAsGlobal();
        $eloquent->bootEloquent();
    }

    public function getConnection()
    {
        return $this->getInstance()->getConnection();
    }

    public function getQueryLog()
    {
        return $this->getConnection()->getQueryLog();
    }

}
