<?php

use Bramus\Router\Router;
use Container\Container;

require __DIR__ . '/vendor/autoload.php';

session_start();

/** app container */
$app = Container::getInstance();

/** app config */
$config = require __DIR__ . '/config/app.php';
$app->set('config.app', $config);

/** define app app_dir */
define('APP_DIR', __DIR__);
define('DOCS_DIR', __DIR__ . '/resources/docs');

/** show errors */
ini_set('display_errors',$config['debug']);
ini_set('display_startup_errors', $config['debug']);
error_reporting(E_ALL);

/** page config */
$page = require __DIR__ . '/config/page.php';
$app->set('config.page', $page);

/** sidebar contents */
$app->set('list', require __DIR__ . '/config/docs.php');

/** theme */
if (!isset($_SESSION['theme']) || !$page['theme']['darkmode']) {
    $_SESSION['theme'] = $page['theme']['default'];
}

$theme = $page['theme'][$_SESSION['theme']];
$app->set('theme', json_decode(file_get_contents(__DIR__ . "/resources/themes/{$theme}.json"), true));

/** parsedown instance */
$app->mapOnce('parse', new Parsedown());

/** twig template */
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/resources/views');
$app->mapOnce('twig', new \Twig\Environment($loader, [
    'cache' => __DIR__ . '/storage/cache/twig',
    'debug' => true,
    'auto_reload' => null,
]));

$app->map('render', function ($template, $params) use ($app) {
    echo $app->twig()->render($template, $params);
});

/** define twig global vars */
$app->twig()->addGlobal('APP_NAME', $config['name']);

/** router */
$app->mapOnce('router', fn() => new Router());

$app->map('run', fn() => $app->router()->run());

require __DIR__ . '/routes/web.php';

