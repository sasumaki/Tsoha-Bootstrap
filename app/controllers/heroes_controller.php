<?php

class HeroController extends BaseController {

    public static function lista() {
        $heroes = Hero::all();
        
        View::make('hero/lista.html', array('heroes' => $heroes));
    }

    public static function show($id) {
        $hero = Hero::find($id);
        $drafts = Yhteys::findDraft($id);
        View::make('hero/show.html', array('hero' => $hero, 'drafts' => $drafts));
    }

    public static function create() {
        self::check_logged_in();
        View::make('hero/new.html');
    }

    public static function store() {
        self::check_logged_in();
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
        self::check_logged_in();
        $hero = Hero::find($id);
        View::make('hero/edit.html', array('attributes' => $hero));
    }

    public static function update($id) {
        self::check_logged_in();
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
        self::check_logged_in();

        $hero = new Hero(array('id' => $id));
//        $yhteys = new Yhteys(array('hero_id' => $id));
//        $draftids = Yhteys::findDraftID($id);
//
//
//        $yhteys->destroy();
//
//        while ($draftids != NULL) {
//            $draft = new Draft(array('id' => $draftids->draft_id));
//            $draft->destroy();
//            $draftids = Yhteys::findDraftID($id);
//        }



        $hero->destroy();


        Redirect::to('/hero', array('message' => 'Hero on poistettu onnistuneesti!'));
    }

}
