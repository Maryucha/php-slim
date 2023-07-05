<?php
require_once __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Hello world");
  return $response;
});


$app->get('/fruits', function (Request $request, Response $response, $args) {
  $fruits = [
    '1' => 'Banana',
    '2' => 'Abacaxi',
    '3' => 'Laranja',
    '4' => 'Melancia',
  ];
  $response->getBody()->write(json_encode($fruits));
  return $response->withHeader('Content-type', 'application/json');
});

$app->get('/fruits/{id}', function (Request $request, Response $response, $args) {
  $fruits = [
    '1' => 'Banana',
    '2' => 'Abacaxi',
    '3' => 'Laranja',
    '4' => 'Melancia',
  ];
  $fruit[$args['id']] = $fruits[$args['id']];
  $response->getBody()->write(json_encode($fruit));
  return $response->withHeader('Content-type', 'application/json');
});

$app->run();
