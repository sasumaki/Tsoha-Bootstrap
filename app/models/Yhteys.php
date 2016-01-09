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
        $query = DB::connection()->prepare('SELECT hero.id, hero.name FROM HERO,Draft, Yhteys WHERE Yhteys.Draft_id = :id AND HERO.id = Yhteys.hero_id AND Draft.id = Yhteys.Draft_id');
        $query->execute(array('id' => $id));

        $rows = $query->fetchAll();
        $yhteys = array();

        foreach ($rows as $row) {
            $yhteys[] = new Yhteys(array(
                
                'id' => $row['id'],
                'name' => $row['name']
                    
            ));
        }
        return $yhteys;
    }

}
