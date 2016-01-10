<?php

class Yhteys extends BaseModel {

    public $hero_id, $draft_id, $name, $id;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Yhteys (hero_id, draft_id) VALUES(:hero_id, :draft_id)');
        $query->execute(array('hero_id' => $this->hero_id, 'draft_id' => $this->draft_id));
    }

    public function find($hero_id, $draft_id) {
        $query = DB::connection()->prepare('SELECT * FROM Yhteys WHERE hero_id = :hero_id AND draft_id = :draft_id LIMIT 1');
        $query->execute(array('hero_id' => $hero_id, 'draft_id' => $draft_id));
        $row = $query->fetch();

        if ($row) {
            $yhteys = new Yhteys(array(
                'hero_id' => $row['hero_id'],
                'draft_id' => $row['draft_id']
                
            ));
            return $yhteys;
        }

        return null;
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Yhteys WHERE hero_id = :hero_id');
        $query->execute(array('hero_id' => $this->hero_id));
    }

    public function findHero($id) {
        $query = DB::connection()->prepare('SELECT hero.id, hero.name FROM HERO INNER JOIN Yhteys ON hero.id = yhteys.hero_id WHERE Yhteys.Draft_id = :id');
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

    public function findDraft($id) {
        $query = DB::connection()->prepare('SELECT Draft.id, Draft.name FROM Draft INNER JOIN Yhteys ON Draft.id = yhteys.draft_id WHERE Yhteys.Hero_id = :id LIMIT 1');
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

    public function findDraftID($id) {
        $query = DB::connection()->prepare('SELECT Draft.id FROM Draft INNER JOIN Yhteys ON Draft.id = yhteys.draft_id WHERE Yhteys.Hero_id = :id');
        $query->execute(array('id' => $id));

        $row = $query->fetch();


        if ($row) {
            $yhteys = new Yhteys(array(
                'id' => $row['id']
            ));
            return $yhteys;
        }
        return null;
    }

}
