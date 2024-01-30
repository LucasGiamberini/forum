<?php
    
    namespace Model\Entities;

    use App\Entity;


    final class Category extends Entity{

        private $id;
        private $name;
   


        public function __construct($data){
            $this->hydrate($data);        
        }

        public function getId()
        {
            return $this->id;
        }

        
        public function getCategoryName()
        {
           return  $this-> categoryName ;
        }

       


       
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        
        
        public function setCategoryName($name){

            $this->categoryName = $name;
        }


        }
    

