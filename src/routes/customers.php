<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;

$app->get('/api/customers', function (Request $request, Response $response) {

    $connection = new DatabaseConnection();
    $users = $connection->getAllUsers();
    $connection = null;
    echo json_encode($users);

});

$app->get('/api/customer/{id}', function (Request $request, Response $response) {

    $id = $request->getAttribute('id');
    $connection = new DatabaseConnection();
    $user = $connection->getUser($id);
    $connection = null;

   echo json_encode($user);
});

$app->post('/api/customer/add', function (Request $request, Response $response) {
    $body = $request->getParsedBody();
    $customer = new Customer($body['firstName'],   $body['lastName'],
                             $body['phoneNumber'], $body['email'],
                             $body['address'],     $body['city'],
                             $body['voivodeship']);
    $connection = new DatabaseConnection();
    $connection->addUser($customer);
    $connection = null;
});