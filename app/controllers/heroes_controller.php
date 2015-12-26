<?php

class HeroController extends BaseController {

    public static function lista() {
        $heroes = Hero::all();
        View::make('hero/lista.html', array('heroes' => $heroes));
    }

    public static function show($id) {
        $heroes = Hero::find($id);
        View::make('hero/:id', array('heroes' => $heroes));
    }

    public static function store() {
        $params = $_POST;
        $hero = new Hero(array(
            'name' => $params['name'],
            'primaryattribute' => $params['primaryattribute'],
            'attacktype' => $params['attacktype'],
            'primaryrole' => $params['primaryrole'],
            'damagetype' => $params['damagetype'],
            'description' => $params['description']
        ));
        Kint::dump($params);
        $hero->save();
    }

}
