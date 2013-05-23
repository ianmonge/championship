<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->mount('/',        include 'controllers/public.php');
$app->mount('/manager', include 'controllers/manager.php');
$app->mount('/admin',   include 'controllers/admin.php');

$redirectWithSlash = function () use ($app) {
    $uri = $_SERVER['REQUEST_URI'] . '/';
    return $app->redirect($uri);
};

$app->get('/manager', $redirectWithSlash);
$app->get('/admin', $redirectWithSlash);

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html.twig' : '500.html.twig';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
