<?php

class yhteyscontroller extends BaseController {

    public static function store() {
        self::check_logged_in();

        $user_logged_in = self::get_user_logged_in();

        $params = $_POST;
        $attributes = array(
            'hero_id' => $params['hero_id'],
            'draft_id' => $params['draft_id']
        );
        $yhteys = new Yhteys($attributes);
        $errors = $yhteys->errors();

        if (count($errors) == 0) {

            $yhteys->save();

            Redirect::to('/drafts');
        } else {
            View::make('drafts/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

}
