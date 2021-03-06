<?php
session_start();
error_reporting(E_ERROR | E_WARNING);
include('../../core/dispatcher.class.php');
include('../../core/controller.class.php');
include('../../core/command.class.php');
include('../../core/bdd.class.php');
include('../../core/errorhandler.class.php');
include('../../config.php');
include('../../route.php');

$app = 'default';

if (file_exists('../../config.' . $app . '.php')) {
    include('../../config.' . $app . '.php');
}

if ($config['error_handler'][$config['env']]['activate']) {
    $handler = new ErrorHandler($config['error_handler'][$config['env']]['file'], $config['error_handler'][$config['env']]['allow_display'], $config['error_handler'][$config['env']]['allow_log'], $config['error_handler'][$config['env']]['report']);
}

$dispatcher = new Dispatcher($config, $app, $route);
