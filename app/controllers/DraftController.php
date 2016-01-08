<?php

class DraftController extends BaseController {

    public static function index() {
        self::check_logged_in();

        $drafts = Draft::all();
        
        View::make('drafts/index.html', array('drafts' => $drafts));
    }

    public static function show($id) {
        self::check_logged_in();

        $draft = Draft::find($id);
        View::make('drafts/show.html', array('draft' => $draft));
    }

    public static function create() {
        self::check_logged_in();
        $heroes = Hero::all();
        View::make('drafts/new.html', array('heroes' => $heroes));
    }

    public static function store() {
        self::check_logged_in();


        $params = $_POST;
        $attributes = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'laatija_id' => $row['laatija_id'],
            'hero1' => $row['hero1'],
            'hero2' => $row['hero2'],
            'hero3' => $row['hero3'],
            'hero4' => $row['hero4'],
            'hero5' => $row['hero5'],
            'vaikeus' => $row['vaikeus'],
            'suunnitelma' => $row['suunnitelma']
        );
        $draft = new Draft($attributes);
        $errors = $draft->errors();

        if (count($errors) == 0) {
            $draft->save();
            Redirect::to('/drafts' . $draft->id, array('message' => 'Drafti on lisätty arkistoon!'));
        } else {
            View::make('drafts/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function edit($id) {
        self::check_logged_in();
        $draft = Draft::find($id);
        View::make('drafts/edit.html', array('attributes' => $draft));
    }
    public static function update() {
        self::check_logged_in();


        $params = $_POST;
        $attributes = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'laatija_id' => $row['laatija_id'],
            'hero1' => $row['hero1'],
            'hero2' => $row['hero2'],
            'hero3' => $row['hero3'],
            'hero4' => $row['hero4'],
            'hero5' => $row['hero5'],
            'vaikeus' => $row['vaikeus'],
            'suunnitelma' => $row['suunnitelma']
        );
        $draft = new Draft($attributes);
        $errors = $draft->errors();

        if (count($errors) == 0) {
            $draft->update();
            Redirect::to('/drafts' . $draft->id, array('message' => 'Drafti on lisätty arkistoon!'));
        } else {
            View::make('drafts/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }
    public static function destroy($id){
        self::check_logged_in();
        $draft = new Draft(array('id'=>$id));
        $draft->destroy();
        Redirect::to('/drafts', array('message' => 'Drafti on poistettu arkistostasi!'));
    }

}
