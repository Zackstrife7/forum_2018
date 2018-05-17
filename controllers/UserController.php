<?php 
/**
* CONTROLLER DE LA CLASSE User
*/
class UserController
{
	
	//chemin vers le dossier model
    private $bundle_path;
    private $model_path;
    private $views_path;
    private $model;

    public function __construct() {

        $this->bundle_path .=  'models/';
        $this->model_path = $this->bundle_path;
        $this->views_path = $this->bundle_path .'views/';



        require_once( $this->model_path.'Model.php' );
        require_once( $this->model_path.'UserModel.php' );
   
        $this->model = new UserModel(SPDO::getInstance());
    }

    // USER
    public function defaultAction(){
        include('views/defaultView.php');
    }
 	public function loginAction(){
       
            $connection = '';    
        
        if (isset($_POST['sub']) && isset($_POST['log']) && $_POST['log'] != "" ) 
        {
           
                $getu= $this->model->getUser($_POST['log']);
            // si l'utilisateur n'est pas présent dans la BDD     
            if ($getu != false) 
            {

              
                // alors on intancie ceci en session
                    $_SESSION['log'] = $_POST['log'];
                    $_SESSION['user'] = $getu;

                // en fonction du rang de l'utilisateur    
                   switch ($getu['u_rang_fk']) {
                        case 3:
                           $connection .= 'Bienvenue   '.$getu['u_prenom'].'  vous etes un ' .$getu['r_libelle']. ' <br> Vous pouvez  ajouter un message dans la conversation de votre choix <a href="?c=conversation&a=showConversations">ICI</a>' ;
                            break;
                        case 2:
                           $connection .= 'Bienvenue   '.$getu['u_prenom']. ' vous etes un ' .$getu['r_libelle']. ' <br> Vous pouvez  ajouter un message dans la conversation de votre choix <a href="?c=conversation&a=showConversations">ICI</a><br>
                               Vous pouvez  supprimer  un message dans la conversation de votre choix <a href="?c=conversation&a=showMessages">ICI</a>     
                                    ' ;
                            break;
                        case 1:
                           $connection .= 'Bienvenue   '.$getu['u_prenom'].' vous etes un ' .$getu['r_libelle']. ' <br> Vous pouvez  ajouter  un message dans la conversation de votre choix <a href="?c=conversation&a=showConversations">ICI</a> <br>
                               Vous pouvez  ajouter  un message dans la conversation de votre choix <a href="?c=conversation&a=delMessage">ICI</a> 
                               Vous pouvez aussi supprimer un utilisateur de votre choix ';
                            break;
                    } 
                   

                    

                   
            }  
     		else{
     			  $connection.= " Le pseudo  ".$_POST['log']. " n'existe pas ; veuillez essayer à nouveau avec un autre pseudonyme ou inscrivez vous";
     			
     		} 
            
            
        }elseif(isset($_POST['sub']) && isset($_POST['log']) && $_POST['log'] == "" ) 
        {
         $connection .= "Veuillez rentrer votre pseudonyme";

        }   
            
        include('views/userView.php');
 	}
    public function signInAction(){
        

        if (isset($_POST['pseudo']) && isset($_POST['prenom']) && isset($_POST['name'])&& isset($_POST['birth']) && isset($_POST['sign']) ) 
        {
               
                $err_u = "";
            if ($_POST['pseudo'] == '' || $_POST['prenom'] == '' || $_POST['name'] == '' || $_POST['birth'] == '') 
            {
                $err_u .= "Veuillez rentrer tout les champs du formulaires";

           

            }
            else{
                
                $get_u= $this->model->getUser($_POST['pseudo']);

                // si le personnage n'existe  pas  déjà dans la base de données
                if( $get_u != true) 
                {
                    if($this->model->addUser($_POST['pseudo'],$_POST['prenom'],$_POST['name'],$_POST['birth'])!== false)
                    {

                        $err_u .='Bienvenue '.$_POST['pseudo']. ' vous etes inscrit et vous pouvez vous connecter pour ajouter un message<br>';
                    }
                    else{
                        $err_u.="Un pb dans l'inscription " ;
                    }

       
                

               
               }
               else{
                    $err_u.= " Le pseudo  ".$_POST['pseudo']. "  est déja utilisé veuillez en choisir un autre";
               }
              
            }        
        }
        include('views/signinView.php');
    }

    


 
}

 ?>