<?
session_start();
spl_autoload_register(function($class) {
    if(file_exists(__DIR__.'/../classes/' . $class. '.php')) require_once __DIR__.'/../classes/' . $class. '.php';
});
$form = new Form();
$pl = new Pipelines();
?>