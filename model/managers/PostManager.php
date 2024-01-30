<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\PostManager;

    class PostManager extends Manager {

        protected $className = "Model\Entities\post";
        protected $tableName = "post";


        public function __construct(){
            parent::connect();
        }

        // faire requete sql ici
        public function findPostTopic($id){
            $sql = "SELECT *
                FROM ".$this->tableName." 
                
                WHERE topic_id = :id
                ";

      
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]), 
                    $this->className
                );

        }

        
        public function update($data, $id){
           
            $sql="UPDATE ".$this->tableName." 
            SET text = :text
            WHERE id_post = :id ";

            $params = [
                ':id' => $id,
                ':text' => $data
            ];

            try{
                return DAO::update($sql, $params);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }

        }

    }
