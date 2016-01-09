<?php

class Yhteys extends BaseModel {

    public $hero_id, $draft_id;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Yhteys (hero_id, draft_id) VALUES(:hero_id, :draft_id) RETURNING id');
        $query->execute(array('hero_id' => $this->hero_id, 'draft_id' => $this->draft_id));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Yhteys WHERE hero_id = :hero_id AND draft_id = :draft_id');
        $query->execute(array('hero_id' => $this->hero_id, 'draft_id' => $this->draft_id));
    }

    public function find($id) {
        $query = DB::connection()->prepare('SELECT hero.id, hero.name, draft.id, draft.name FROM Draft '
                . 'JOIN Yhteys ON Draft.id = Yhteys.draft_id '
                . 'JOIN HERO ON hero.id = Yhteys.hero_id WHERE Draft.id = :id');
        $query->execute(array('id' => $id));

        $rows = $query->fetchAll();
        $yhteys = array();

        foreach ($rows as $row) {
            $yhteys[] = new Yhteys(array(
                'hero_id' => $row['hero_id'],
                'draft_id' => $row['draft_id']
            ));
        }
        return $yhteys;
    }

}
