<?php

class Hero extends BaseModel {

    public $id, $name, $primaryattribute, $attacktype, $primaryrole, $damagetype, $description;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name');
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Hero (name, primaryattribute, attacktype, primaryrole, damagetype, description) VALUES(:name, :primaryattribute, :attacktype, :primaryrole, :damagetype, :description) RETURNING id');
        $query->execute(array('name' => $this->name, 'primaryattribute' => $this->primaryattribute, 'attacktype' => $this->attacktype, 'primaryrole' => $this->primaryrole, 'damagetype' => $this->damagetype, 'description' => $this->description));
        $row = $query->fetch();
        Kint::trace();
        Kint::dump($row);
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Hero WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }
    public function update() {
        $query = DB::connection()->prepare('UPDATE Hero SET name = :name, primaryattribute = :primaryattribute, attacktype = :attacktype, primaryrole = :primaryrole, damagetype = :damagetype, description = :description WHERE id = :id');
        $query->execute(array('id' => $this->id, 'name' => $this->name, 'primaryattribute' => $this->primaryattribute, 'attacktype' => $this->attacktype, 'primaryrole' => $this->primaryrole, 'damagetype' => $this->damagetype, 'description' => $this->description));
         
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Hero');
        $query->execute();
        $rows = $query->fetchAll();
        $heroes = array();

        foreach ($rows as $row) {
            $heroes[] = new Hero(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'primaryattribute' => $row['primaryattribute'],
                'attacktype' => $row['attacktype'],
                'primaryrole' => $row['primaryrole'],
                'damagetype' => $row['damagetype'],
                'description' => $row['description']
            ));
        }

        return $heroes;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Hero WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $hero = new Hero(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'primaryattribute' => $row['primaryattribute'],
                'attacktype' => $row['attacktype'],
                'primaryrole' => $row['primaryrole'],
                'damagetype' => $row['damagetype'],
                'description' => $row['description']
            ));

            return $hero;
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



    public static function findname($name) {
        $query = DB::connection()->prepare('SELECT * FROM Hero WHERE name = :name');
        $query->execute(array('name' => $name));
        $rows = $query->fetchAll();
        $heroes = array();

        foreach ($rows as $row) {
            $heroes[] = new Hero(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'primaryattribute' => $row['primaryattribute'],
                'attacktype' => $row['attacktype'],
                'primaryrole' => $row['primaryrole'],
                'damagetype' => $row['damagetype'],
                'description' => $row['description']
            ));

            return $heroes;
        }
        return null;
    }

}
