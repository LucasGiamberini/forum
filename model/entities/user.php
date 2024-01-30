<?php
    
    namespace Model\Entities;

    use App\Entity;


    final class user extends Entity{

        private $id;
        private $creationTime;
        private $pseudo;
        private $password;
        private $role;
        private $isBanned;


        public function __construct($data){
            $this->hydrate($data);        
        }

        public function getId()
        {
            return $this->id;
        }

        public function getCreationTime(){
            return $this-> creationTime;
        }

        
        public function getPseudo()
        {
           return  $this->pseudo ;
        }

        public function  getPassword(){
            return $this->password;
        }

        public function getRole(){
            return $this->role ;
        }

        public function getBanned(){
            return $this->isBanned  ;
        }

       


       
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        
        public function setCreationTime($creationTime){
             $this-> creationTime = $creationTime;
        }
        
        public function setPseudo($pseudo){

            $this->pseudo = $pseudo;
        }

        public function setPassword($password){

            $this->password = $password;
        }

        public function setrole($role){
            $this->role = $role;
        }

        public function setBan($isBanned){
            $this->isBanned = $isBanned;
        }

        }
    