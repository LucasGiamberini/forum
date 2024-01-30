<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }
       
        public function findTopicCategory($id){
            $sql = "SELECT *
                FROM ".$this->tableName." 
                WHERE category_id = :id
                ";

      
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]), 
                    $this->className
                );

        }

        public function findTopicInfo(){

            $sql="SELECT * 
            FROM category ";

            return $this->getMultipleResults(
              DAO::select($sql), 
            $this->className
               );

        }


        public function update($data, $id){
           
            $sql="UPDATE ".$this->tableName." 
            SET title = :title
            WHERE id_topic = :id ";

            $params = [
                ':id' => $id,
                ':title' => $data
            ];

            try{
                return DAO::update($sql, $params);
            }
            catch(\PDOException $e){
                echo $e->getMessage();
                die();
            }

        }


        public function deleteChildren($id){

            $sql="DELETE From post
            
            where topic_id= :id";

            $params = [
                ':id' => $id
            ];


        try{
        return DAO::delete($sql, $params);
        }
        catch(\PDOException $e){
        echo $e->getMessage();
        die();
        }



        }

    }