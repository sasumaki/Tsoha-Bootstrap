<?php

$routes->get('/', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});
$routes->get('/hero', function() {
    HeroController::lista();
});
$routes->post('/hero', function() {
    HeroController::store();
});
$routes->get('/hero/new', function() {
    HeroController::create();
});
$routes->get('/hero/:id', function($id) {
    HeroController::show($id);
});
$routes->get('/hero/:id/edit', function($id) {
    HeroController::edit($id);
});
$routes->post('/hero/:id/edit', function($id) {
    HeroController::update($id);
});
$routes->get('/login', function() {
    // Kirjautumislomakkeen esittäminen
    UserController::login();
});
$routes->post('/login', function() {
    // Kirjautumisen käsittely
    UserController::handle_login();
});
$routes->post('/logout', function() {
    UserController::logout();
});
$routes->post('/hero/:id/destroy', function($id) {

    HeroController::destroy($id);
});
$routes->get('/drafts', function() {
    DraftController::index();
});
$routes->get('/drafts/new', function() {
    DraftController::create();
});
$routes->get('/drafts/:id', function($id) {
    DraftController::show($id);
});
$routes->post('/drafts', function() {

    DraftController::store();
});
$routes->get('/drafts/:id/edit', function($id) {
    DraftController::edit($id);
}
);
$routes->post('/drafts/:id/edit', function($id) {
    DraftController::update($id);
}
);
$routes->post('/drafts/:id/destroy', function($id) {

    DraftController::destroy($id);
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
