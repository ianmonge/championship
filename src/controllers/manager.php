<?php

$manager = $app['controllers_factory'];
$manager->get(
    '/',
    function () use ($app) {
        return $app['twig']->render('manager/index.html.twig', array());
    }
)
->bind('manager.homepage')
;

return $manager;
