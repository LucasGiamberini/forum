<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;

    
    class SecurityController extends AbstractController implements ControllerInterface{


       
        public function register(){
            
            $userPseudo=filter_input(INPUT_POST,"pseudoRegister", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
            $userPassword=filter_input(INPUT_POST,"passwordRegister",FILTER_VALIDATE_REGEXP, [
                "options" => [
                    "regexp" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{12,64}$/"
                    // "regexp" => "/[A-Za-z0-9].{8,32}/"
                    ]
                ]);
            $PasswordConfirm=filter_input(INPUT_POST,"passwordConfirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ;
            
        
            if($userPassword == false ) {// verification si le mdp respecte les condition du regex (ligne 21)
                echo 'le mots de passe ne respecte pas les condition (Une minuscule,une majuscule ,un chiffre, un caractère special et 12 caractère)';

                return [
                    "view" => VIEW_DIR."security/register.php"
                ];
                die;
            }
      
            if($userPassword !=  $PasswordConfirm) {// verification mdp est ecrit deux fois le meme
                echo 'les mots de passe ne corresponde pas';

                return [
                    "view" => VIEW_DIR."security/register.php"
                ];
                die;
            }

           
            
            $userPasswordHash=password_hash($userPassword, PASSWORD_DEFAULT);// pour enregistrer le mdp de maniere cripter dans la bdd
            $creationDate= new \DateTime();
            $creationDateFormatted = $creationDate->format('Y-m-d H:i:s');
            $isBanned= 0 ;
            $role = json_encode(['ROLE_USER']);//defini le role

            
            $data=[
                "creationTime" => $creationDateFormatted,
                "pseudo" => $userPseudo, 
                "password" => $userPasswordHash , 
                "isBanned" => $isBanned ,
                "role" => $role   
            ];
            $userManager= new UserManager();
            $userManager->add($data);
            
            // var_dump($userPseudo, $userPasswordHash, $role, $creationDate); die;

            return [
                "view" => VIEW_DIR."security/login.php",
            ];


        }

        public function login(){

            $pseudo=filter_input(INPUT_POST,"pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS );
            $password=filter_input(INPUT_POST,"password", FILTER_SANITIZE_FULL_SPECIAL_CHARS );

            $userManager= new UserManager();
            $user = $userManager->findUserByPseudo($pseudo);

            if(!$user) {//si user=null
                Session::addFlash('error', 'Utilisateur non trouvé');
                $this->redirectTo('security', 'login');
            } else {
    
                $passwordBdd = $user->getPassword();// voir dans entities/user.php
                
                if(password_verify($password, $passwordBdd)){//voir Session.php
                    Session::addFlash('success', 'bienvenue');
                    Session::setUser($user);


                    $categoryManager = new CategoryManager();
                    return [
                        "view" => VIEW_DIR."forum/listCategory.php",
                        "data" => [
                            "category" => $categoryManager->findAll(["categoryName", "ASC"])
                        ]
                            
                    ];
                }else{
                    Session::addFlash('error', 'mot de passe incorrecte');
                    $this->redirectTo('security','login');
                }
            
            }

        }



        public function logout()
        {

            unset($_SESSION["user"]);

            $categoryManager = new CategoryManager();
            return [
                "view" => VIEW_DIR."forum/listCategory.php",
                "data" => [
                    "category" => $categoryManager->findAll(["categoryName", "ASC"])
                ]
                   
            ];


        }











       
    }