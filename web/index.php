<?php

require_once dirname(__DIR__) . '/vendor/autoload.php'; 

$parser = new Symfony\Component\Yaml\Yaml();
$global = $parser->parse(dirname(__DIR__) . '/config/global.yml');
$config = $parser->parse(sprintf(dirname(__DIR__) . '/config/%s.yml', $global['environment']));
$security = $parser->parse(dirname(__DIR__) . '/config/security.yml');
$routes = $parser->parse(dirname(__DIR__) . '/config/routes.yml');



$app = new App\Application(array_merge($global, $config, $security, $routes));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
    'twig.form.templates' => array(
        'template/layout.html.twig'
    ),
));

$app->get("/admin", "App\Controller\AdminController::index");


/** Doctrine cli-config also uses this bootstrap for db etc, so don't run HTTP stuff if cli is being used **/
isset($cli) ?: $app->run();