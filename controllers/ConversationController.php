<?php 

class ConversationController 
{
	//chemin vers le dossier model
    private $bundle_path;
    private $model_path;
    private $views_path;
    private $model;

    public function __construct() {

        $this->bundle_path .=  'models/';
        $this->model_path = $this->bundle_path;
     


        require_once( $this->model_path.'Model.php' );
        require_once( $this->model_path.'ConversationModel.php' );
   
        $this->model = new ConversationModel(SPDO::getInstance());
    }


	public function showConversationsAction(){
		
		$conversations= $this->model->GetAll();
		$str = '';
		$mess ="";
				
			foreach ($conversations as $key => $value) {
				
					
					$str.= $value['c_termine'] == 1 ? '<tr class ="closed" scope="row">' : '<tr class="opened" scope="row">' ;
					$str.='<td>'.$value['c_id'].'</td>';
					$str.='<td>'.$value['date'].'</td>';
					$str.='<td>'.$value['heure'].'</td>';
					$str.='<td>'.$value['nbr_mess'].'</td>';
					
					$value['nbr_mess'] > 0 ? $str.='<td><a href="?c=conversation&a=showMessages&id='.$value['c_id'].'&p=0&t=m_date">Voir Messages</a></td>' : $str.='<td>Cette conversation est vide pour le moment</td>';
				}
			// si le user se connecte et selon le type d'utilisateur  connecté 		
			if (isset($_SESSION['user'])) 
			{
				
				require('views/conversationView.php');
				require('views/addMessView.php');

				if($_SESSION['user']['r_id'] <= 2){
					
					require('views/deleteConvView.php');
				}
			}else{
				$err = "Veuillez vous connectez si vous voulez ajouter un message";
				require('views/conversationView.php');
			}	
				
			 
		
	}	

	public function showMessagesAction(){
			$messages= $this->model->getMess($_GET['id'],$_GET['p'],$_GET['t']);
				
		if (isset($_GET['id']) && !empty($messages)){
			
			$mess = '';
			foreach ($messages as $key =>  $message) 
			{
				
				$mess.='<tr>';
				$mess.='<td>'.$message['m_id'].'</td>';
				$mess.='<td>'.$message['m_date'].'</td>';
				$mess.='<td>'.$message['m_heure'].'</td>';
				$mess.='<td>'.$message['m_auteur'].'</td>';
				$mess.='<td>'.$message['m_contenu'].'</td>';
				$mess.='</tr>';

			}
			
			
			$link_page ='';
			if ($_GET['p'] == 0 ) {
				
				$link_page.='<a class="btn btn-primary btn-sm" href="?c=conversation&a=showMessages&id='.$_GET['id'].'&p='.($_GET['p'] + 1).'&t='.$_GET['t'].'">Page suivante</a>';

			}
			else{
				$link_page.='<a class="btn btn-primary btn-sm" href="?c=conversation&a=showMessages&id='.$_GET['id'].'&p='.($_GET['p'] - 1).'&t='.$_GET['t'].'">Page précedente</a>';
				$link_page.='<a class="btn btn-primary btn-sm"  href="?c=conversation&a=showMessages&id='.$_GET['id'].'&p='.($_GET['p'] + 1).'&t='.$_GET['t'].'">Page suivante</a>';
			}
	
			include('views/messagesView.php');
		}
		//si la prochaine page ne contient pas de message , alors on est redirigé à la premiere page
		elseif(isset($_GET['id']) && empty($messages)){
			header('Location:?c=conversation&a=showMessages&id='.$_GET['id'].'&p=0&t='.$_GET['t']);
		}


 	}
 	// Inserer un message dans 1 conv choisi
 	public function addMessageAction(){
 	
 		if(isset($_POST['conv'])&& isset($_POST['mess']) && $_POST['mess']!= '' && isset($_POST['ins'])){

	 			return $this->model->insert($_POST['mess'],$_SESSION['user']['u_id'],$_POST['conv']);
 		}
 	}
 	public function redirectionErreur404()
  	{
		    header('HTTP/1.0 404 Not Found');
		    header('Location: err/error404.html');
		    exit;
  	}
  	// Ajouter une nouvelle conversation 
	public function addConversationAction(){
	
			$err ='';
		if (isset($_SESSION['user'])) 
		{
			
			if ($_SESSION['user']['r_id'] <= 1){
				
				if ( $this->model->addConv() === false)
				{
					$lastid = SPDO::getInstance()->lastInsertId(); 
					$newconv = $this->model->getConv($lastid);

				}
			}
			else{
				$err.= "Votre rang ne vous permet pas d'éfféctuer cette action";

			}

		}
		else{

			$err.= 'Veuillez vous connecter ';
			// require('views/defaultView.php');
			
		}
		require('views/defaultView.php');
		include_once('views/oneconversationView.php');
	}
	public function deleteConversationAction(){
		
		if (isset($_POST['conversation']) && isset($_POST['del'])) 
		{
			    if($this->model->delConv($_POST['conversation'])!= false){
			    	header('Location: ?c=conversation&a=showConversations');
			   		 $mess.= 'Conversation Numero '.$_POST['conversation']. 'supprimée ';

			    }
			    else{
			    	header('Location: ?c=conversation&a=showConversations');
			    	$mess ="Conversation non supprimée";
			    }
			
			

		}
		include('views/deleteConvView.php');


	}
		
		
			
	
 		
}


 ?>
 				
	

 			
 			
	 				 	
 				  
	 				 
	 				 
 		
 				  

 				   
 		
 			
 			

 		
 			
 		



 	