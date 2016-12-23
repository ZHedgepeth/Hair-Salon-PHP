<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll(), 'clients' => Client::getAll()));
    });

    $app->post("/create_stylist", function() use ($app) {
        $new_stylist= new Stylist($_POST['new_stylist']);
        $new_stylist->save();
        return $app["twig"]->render("index.html.twig", array('stylists' => Stylist::getAll(), 'clients' => Client::getAll()));
    });

    $app->get("/stylists/{id}", function($stylist_id) use ($app) {
        $stylist = Stylist::find($stylist_id);
        $match_clients = $stylist->getClients();
        return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'matchingClients' => $match_clients));
    });


    return $app;


?>
