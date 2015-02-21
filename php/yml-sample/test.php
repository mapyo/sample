<?php
# ref. http://symfony.com/doc/current/components/yaml/introduction.html
require 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
$value = Yaml::parse(file_get_contents('test.yml'));
var_dump($value);

/*
array(1) {
  [0]=>
  array(3) {
    ["a"]=>
    string(4) "hoge"
    ["b"]=>
    string(5) "hogeb"
    ["c"]=>
    string(5) "hogec"
  }
}
 */
