<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends BaseModel {

    public $username, $password;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function find_user() {
        $query = DB::connection()->prepare('SELECT * FROM Player WHERE username = :username AND password = :password LIMIT 1');
        $query->execute(array('username' => $username, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
// Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
            return $row;
        } else {
// Käyttäjää ei löytynyt, palautetaan null
        }
    }

}
