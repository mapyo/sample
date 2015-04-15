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
