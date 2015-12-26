<?php
require 'app/models/Hero.php';

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on etusivu!';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        $Sven = Hero::find(1);
        $Heroes = Hero::all();
        
        Kint::dump($Heroes);
        Kint::dump($Sven);
    }

    public static function lista() {
        View::make('suunnitelmat/lista.html');
    }

    public static function show() {
        View::make('suunnitelmat/show.html');
    }

    public static function login() {
        View::make('suunnitelmat/login.html');
    }

    public static function modify() {
        View::make('suunnitelmat/modify.html');
    }

}
