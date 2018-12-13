 <?php
            header('Content-Type: application/json');
            $UsersList = [];
            Class User {
            public $pseudo;
            public $mdp;

            
            public function  __construct($pseudo,$mdp) {
            $this->pseudo = $pseudo;
            $this->mdp = $mdp;
            }
            }
            
            array_push($UsersList,new User("Matthew", "Tobin", "MatthewFTobin@teleworm.us", "ceiX2AShoh"));
            array_push($UsersList,new User("Oliver", "Meyer", "OliverCMeyer@jourrapide.com", "faequ0Thio"));
            array_push($UsersList,new User("Judy", "Staley", "JudyRStaley@rhyta.com", "shooleey1Mai"));
            
            $result["Success"] = false;
            if(isset($_GET["email"]) && isset($_GET["password"])){
            foreach ($UsersList as $user){
            if($_GET["email"] == $user->email && $_GET["password"] == $user->password){
            $result["Success"] = true;
            $result["User"] = $user;
            break;
            }
            else{
            continue;
            }
            }
            }
            echo json_encode($result, JSON_PRETTY_PRINT);
            die();
            ?>
        