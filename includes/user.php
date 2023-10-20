<?php
include 'db.php';

class User extends DB{
    private $nombre;
  


    public function userExists($user){
    
        $query = $this->connect()->prepare('SELECT * FROM paciente WHERE Teléfono = :user');
        $query->execute(['user' => $user ]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM paciente WHERE Teléfono = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['Nombre'];
         
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>