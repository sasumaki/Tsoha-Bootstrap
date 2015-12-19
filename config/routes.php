<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});
$routes->get('/lista', function() {
    HelloWorldController::lista();
});
$routes->get('/show', function() {
    HelloWorldController::show();
});

$routes->get('/login', function() {
    HelloWorldController::login();
});
$routes->get('/modify', function() {
    HelloWorldController::modify();
});