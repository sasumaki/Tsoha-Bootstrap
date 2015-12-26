<?php

class Hero extends BaseModel {

    public $id, $name, $primaryattribute, $attacktype, $primaryrole, $damagetype, $description;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Hero (name, primaryattribute, attacktype, primaryrole, damagetype, description VALUES(:name, :primaryattribute, :attacktype, :primaryrole, :damagetype, :description RETURNING id');
        $query->execute(array('name' => $this->name, 'primaryattribute' => $this->primaryattribute, 'attacktype' => $this->attacktype, 'primaryrole' => $this->primaryrole, 'damagetype' => $this->damagetype, 'description' => $this->description));
        $row = $query->fetch();
        Kint::trace();
        Kint::dump($row);
        // $this->id = $row['id'];
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

//    public static function findattribute($primaryattribute) {
//        $query = DB::connection()->prepare('SELECT * FROM Hero WHERE primaryattribute = :primaryattribute');
//        $query->execute(array('primaryattribute' => $primaryattribute));
//        $rows = $query->fetchAll();
//        $heroes = array();
//
//        foreach ($rows as $row) {
//            $heroes[] = new Hero(array(
//                'id' => $row['id'],
//                'name' => $row['name'],
//                'primaryattribute' => $row['primaryattribute'],
//                'attacktype' => $row['attacktype'],
//                'primaryrole' => $row['primaryrole'],
//                'damagetype' => $row['damagetype'],
//                'description' => $row['description']
//            ));
//
//            return $heroes;
//        }
//        return null;
//    }
}
