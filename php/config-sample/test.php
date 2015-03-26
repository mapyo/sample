<?php
require 'vendor/autoload.php';
use Noodlehaus\Config;

define('DEBUG_FLG', true);
// define('DEBUG_FLG', false);


if(DEBUG_FLG === false) {
    /// 本番
    $stage = 'production';
} else {
    // 開発環境
    $stage = 'development';
}


$conf = Config::load(__DIR__ . "/config/{$stage}.yml");
var_dump($conf['db']);
var_dump($conf['db.host']);


