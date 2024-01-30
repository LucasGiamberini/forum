<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategoryManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          
      
           $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",//redirige vers la vue 
                "data" => [
                    "topics" => $topicManager->findAll(["creationdate", "DESC"])// renvoie les donnée necessaire a la vue
                ]
            ];

        
        }

        public function postTopic($id){
          
        $postManager = new PostManager();
            return [
                "view" => VIEW_DIR."forum/postTopic.php",
                "data" => [
                    "post" => $postManager->findPostTopic($id)
                ]
            ];

        }


        public function category(){
            $categoryManager = new CategoryManager();
            return [
                "view" => VIEW_DIR."forum/listCategory.php",
                "data" => [
                    "category" => $categoryManager->findAll(["categoryName", "ASC"])
                ]
                   
                ];
            
        }

        public function addTopic(){
            $topicManager=new TopicManager();
            $postManager=new PostManager();

            $topicCategory=$_POST['categoryiD'];
         
            $topicTitle=filter_input(INPUT_POST,"topicTitle", FILTER_SANITIZE_FULL_SPECIAL_CHARS );//pour eviter les injections sql
            $topicDate= new \DateTime();
            $topicDateFormatted = $topicDate->format('Y-m-d H:i:s');
            $topicUser= filter_input(INPUT_POST,"userID", FILTER_VALIDATE_INT );
            $isLocked = 0 ;
            $message= filter_input(INPUT_POST,"message", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
            
            //data qui sont inserer dans la function add de app/manager
            $data=["category_id"  => $topicCategory , "title" => $topicTitle , "creationDate" => $topicDateFormatted ,
            "user_id" => $topicUser, "closed" => $isLocked ];
               
            $idTopic = $topicManager->add($data);// upload des infos du topic

            $dataMessage = [
                'text' => $message,
                "user_id" => $topicUser,
                "creationDate" => $topicDateFormatted,
                'topic_id' => $idTopic
            ];

            //on recup le message 

            $postManager->add($dataMessage);//upload du message
          
            
            $this->redirectTo('forum','topicByCategory', $topicCategory);


        }




        public function addPost(){
            $postManager=new PostManager();

            $topicCategory=$_POST['topicChoice'];
         
            $topicText=filter_input(INPUT_POST,"postText", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
            $topicDate= new \DateTime();
            $topicDateFormatted = $topicDate->format('Y-m-d H:i:s');
            $topicUser= 1;
          

            $data=["topic_id"  => $topicCategory , "text" => $topicText , "creationDate" => $topicDateFormatted ,
            "user_id" => $topicUser  ];

            
            return [
                "view" => VIEW_DIR."forum/listCategory.php",
                "data" => [
                    "topic" => $postManager-> add($data)
                ]
            ];



        }

        public function addTopicMenu(){

            $categoryManager = new CategoryManager();

            return [
            "view" => VIEW_DIR."forum/addTopic.php",
            "data" => [
                "category" =>  $categoryManager->findAll(["categoryName", "ASC"])
            ]

            ];

        }


        public function addPostMenu(){

            $categoryManager = new TopicManager();

            return [
            "view" => VIEW_DIR."forum/addPost.php",
            "data" => [
                "topic" =>  $categoryManager->findAll(["title", "ASC"])
            ]

            ];

        }


       public function topicByCategory($id){

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findTopicCategory($id),
                "category" => $categoryManager->findOneById($id)

            ]
        ];

       }

       public function addCategoryMenu(){

        return ["view" => VIEW_DIR."forum/addCategory.php"];

       }

       public function addCategory(){
        $categoryManager = new CategoryManager();
        $categoryName=filter_input(INPUT_POST,"category", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        $data=["categoryName"  => $categoryName ];

        return [
            "view" => VIEW_DIR."forum/addCategory.php",
            "data" => [
                "category" => $categoryManager-> add($data)
            ]
        ];


       }

       public function editCategoryMenu($id){
        $categoryManager = new CategoryManager();
       
       
        return [
        "view" => VIEW_DIR."forum/editCategory.php",
        "data" => [
            "category" => $categoryManager->findOneById($id)
        ]
           
        ];
    
       }

       public function editTopicMenu($id){
        $topicManager = new TopicManager();
       
       
        return [
        "view" => VIEW_DIR."forum/editTopic.php",
        "data" => [
            "topic" => $topicManager->findOneById($id)
        ]
           
        ];
    
       }



       public function updateCategory($id){
 
        $categoryManager = new CategoryManager();
        $categoryNewName= filter_input(INPUT_POST,"updateCategory", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
       $categoryManager->update($categoryNewName, $id);


        return [
            "view" => VIEW_DIR."forum/listCategory.php",
            "data" => [
                "category" => $categoryManager->findAll(["categoryName", "ASC"])
            ]
        ];
       }

       public function updateTopic($id){
 
        $topicManager = new TopicManager();
        $topicNewName= filter_input(INPUT_POST,"updateTopic", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
       $topicManager->update($topicNewName, $id);


        return [
            "view" => VIEW_DIR."forum/listCategory.php",
            "data" => [
                "topic" => $topicManager->findAll(["title", "ASC"])
            ]
        ];
       }

       public function deleteCategory($id){
        $categoryManager = new CategoryManager();

        $categoryManager->delete($id);
        
        return [
            "view" => VIEW_DIR."forum/listCategory.php"
      
        ];

       }

       public function deleteTopic($id){
        $topicManager = new TopicManager();

        $topicManager->deleteChildren($id);
        $topicManager->delete($id);

        
        return [
            "view" => VIEW_DIR."forum/listCategory.php"
      
        ];

       }


       public function editPostMenu($id){
        $postManager = new PostManager();

        return [
            "view" => VIEW_DIR."forum/editPost.php",
            "data" => [
                "post" => $postManager->findOneById($id)
            ]
               
            ];

       }



       public function updatePost($id){

        $postManager = new PostManager();
        $postNewText= filter_input(INPUT_POST,"updatePost", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
       $postManager->update($postNewText, $id);


        return [
            "view" => VIEW_DIR."forum/postTopic.php",
            "data" => [
                "post" => $postManager->findPostTopic($id)
            ]
        ];

       }

       public function deletePost($id){
        $postManager = new PostManager();

        $postManager->delete($id);

        
        return [
            "view" => VIEW_DIR."forum/listCategory.php"
      
        ];

       }
    }
