<?php
    
    namespace Model\Entities;

    use App\Entity;


    final class Post extends Entity{

        private $id;
        private $creationDate;
        private $text;
        private $user;
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

        public function getUserId(){
            return $this->user ;
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
        }

        public function setText($text){

            $this->text = $text;
        }

        public function setUserId($user){
            $this->user =$user;
        }

        public function setTopicId($topic){
            $this->topic = $topic;
        }

        }
    

