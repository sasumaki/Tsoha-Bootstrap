<?php

class Draft extends BaseModel {

    public $id, $name, $laatija_id, $hero1, $hero2, $hero3, $hero4, $hero5, $vaikeus, $suunnitelma, $draft_id, $hero_id;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name');
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Draft (name, laatija_id, hero1, hero2, hero3, hero4, hero5, vaikeus, suunnitelma) VALUES(:name, :laatija_id, :hero1, :hero2, :hero3, :hero4, :hero5, :vaikeus, :suunnitelma) RETURNING id');
        $query->execute(array('name' => $this->name, 'laatija_id' => $this->laatija_id, 'hero1' => $this->hero1, 'hero2' => $this->hero2, 'hero3' => $this->hero3, 'hero4' => $this->hero4, 'hero5' => $this->hero5, 'vaikeus' => $this->vaikeus, 'suunnitelma' => $this->suunnitelma));
        
        $query = DB::connection()->prepare('INSERT INTO Yhteys (hero_id, draft_id) VALUES (:hero1, SELECT LASTVAL())');
        $query->execute(array('hero1' => $this->hero1));


        
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Draft WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Draft (name, laatija_id, hero1, hero2, hero3, hero4, hero5, vaikeus, suunnitelma) VALUES(:name, :laatija_id, :hero1, :hero2, :hero3, :hero4, :hero5, :vaikeus, :suunnitelma) WHERE id = :id');
        $query->execute(array('id' => $this->id, 'name' => $this->name, 'laatija_id' => $this->laatija_id, 'hero1' => $this->hero1, 'hero2' => $this->hero2, 'hero3' => $this->hero3, 'hero4' => $this->hero4, 'hero5' => $this->hero5, 'vaikeus' => $this->vaikeus, 'suunnitelma' => $this->suunnitelma));
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Draft');
        $query->execute();
        $rows = $query->fetchAll();
        $drafts = array();

        foreach ($rows as $row) {
            $drafts[] = new Draft(array(
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
            ));
        }

        return $drafts;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Draft WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $draft = new Draft(array(
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
            ));
            return $draft;
        }

        return null;
    }

    public function validate_name() {
        $errors = array();
        if ($this->name == '' || $this->name == null) {
            $errors[] = 'Nimi ei saa olla tyhjä';
        }
        if (strlen($this->name) < 2) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kaksi merkkiä!';
        }
        return $errors;
    }

}
