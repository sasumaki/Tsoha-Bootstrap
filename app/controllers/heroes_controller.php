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

    public static function edit($id) {
        $hero = Hero::find($id);
        View::make('hero/edit.html', array('attributes' => $hero));
    }

    public static function update($id) {
        $params = $_POST;
        $attributes = array(
            'id' => $id,
            'name' => $params['name'],
            'primaryattribute' => $params['primaryattribute'],
            'damagetype' => $params['damagetype'],
            'attacktype' => $params['attacktype'],
            'primaryrole' => $params['primaryrole'],
            'description' => $params['description']
        );


        $hero = new Hero($attributes);
        $errors = $hero->errors();

        if (count($errors) > 0) {
            View::make('hero/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {

            $hero->update();

            Redirect::to('/hero/' . $hero->id, array('message' => 'Heroa on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {

        $hero = new Hero(array('id' => $id));

        $hero->destroy();


        Redirect::to('/hero', array('message' => 'Peli on poistettu onnistuneesti!'));
    }

}
