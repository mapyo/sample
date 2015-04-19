<?php
namespace Model;

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Events\Dispatcher;
use \Illuminate\Container\Container;
use Noodlehaus\Config;

class Manager
{
    private static $eloquent = null;

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
        if (null !== $this->eloquent) {
            return;
        }

        $conf = Config::load('./config/database.yml');
        $this->eloquent = new Capsule;
        // 更新の時はmaster, 参照の時はslaveに自動的に切り替わる
        $this->eloquent->addConnection(array(
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
        $this->eloquent->setEventDispatcher(new Dispatcher(new Container));
        $this->eloquent->setAsGlobal();
        $this->eloquent->bootEloquent();
    }

    public function __call($method, $params)
    {
        return call_user_func_array(array($this->eloquent, $method), $params);
    }
}
