<?php

$admin = $app['controllers_factory'];
$admin->get(
    '/',
    function () use ($app) {
        return $app['twig']->render('admin/index.html.twig', array());
    }
)
->bind('admin.homepage')
;

return $admin;
