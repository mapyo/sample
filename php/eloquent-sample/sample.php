<?php
use Model\Eloquent;
use Model\User;

// composerのautoload設定
$loader = require('./vendor/autoload.php');
$loader->add('Model\\', __DIR__);

// 初期化処理
Eloquent::init();

$user = User::find(1);
var_dump($user->name);

$results = Eloquent::getConnection()
    ->select('select * from my_users');
var_dump($results[0]['name']);

$log = Eloquent::getConnection()->getQueryLog();
var_dump($log);
