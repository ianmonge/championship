<?php

$public = $app['controllers_factory'];
$public->get(
    '/',
    function () use ($app) {
        return $app['twig']->render('public/index.html', array());
    }
)
->bind('public.homepage')
;

return $public;
