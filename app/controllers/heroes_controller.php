<?php

class HeroController extends BaseController {

    public static function lista() {
        $heroes = Hero::all();
        View::make('hero/lista.html', array('heroes' => $heroes));
    }

    public static function show($id) {
        $heroes = Hero::find($id);
        View::make('hero/show.html', array('hero' => $heroes));
    }

    public static function create() {
        View::make('hero/new.html');
    }

    public static function store() {
        $params = $_POST;
        $attributes = array(
            'name' => $params['name'],
            'primaryattribute' => $params['primaryattribute'],
            'attacktype' => $params['attacktype'],
            'primaryrole' => $params['primaryrole'],
            'damagetype' => $params['damagetype'],
            'description' => $params['description']
        );

        $hero = new Hero($attributes);
        $errors = $hero->errors();

        if (count($errors) == 0) {
            $hero->save();
            Redirect::to('/hero' . $hero->id, array('message' => 'Hero on lisätty arkistoon!'));
        } else {
            View::make('hero/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

}
