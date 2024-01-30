<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\CategoryManager;

    class CategoryManager extends Manager{

        protected $className = "Model\Entities\Category";
        protected $tableName = "category";


        public function __construct(){
            parent::connect();
        }


        

        public function update($data, $id){
           
            $sql="UPDATE ".$this->tableName." 
            SET categoryName= :name
            WHERE id_category = :id ";

            $params = [
                ':id' => $id,
                ':name' => $data
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