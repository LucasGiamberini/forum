<?php
    
    namespace Model\Entities;

    use App\Entity;


    final class Post extends Entity{

        private $id;
        private $creationDate;
        private $text;
        private $user_id;
        private $topic;


        public function __construct($data){
            $this->hydrate($data);        
        }

        public function getId()
        {
            return $this->id;
        }

        
        public function getcreationDate()
        {
           return  $this-> creationDate ;
        }

        public function  getText(){
            return $this->text;
        }

    

        public function getIdUser()
        {
            return $this-> user_id ;
        }

        public function getTopicId(){
            return $this->topic ;
        }

       


       
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        
        
        public function setCreationDate($creationDate){

            $this->creationDate = $creationDate;

            return $this;
        }

        public function setText($text){

            $this->text = $text;

            return $this;
        }

        public function setIdUser($user_id){
            $this-> user_id = $user_id;

            return $this;
        }

        public function setTopicId($topic){
            $this->topic = $topic;

            return $this;
        }

        }
    

