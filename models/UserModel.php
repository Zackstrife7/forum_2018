
<?php 
/**
* MODELE de la table USER
*/
class UserModel extends Model
{
	
	public function getUser($name){
	  		$user  = 'SELECT  *
					FROM `user`
				  JOIN `rang`
					ON `u_rang_fk` = `r_id`
	  			WHERE `u_login`=:login ';
	  		$option = array('login'=>$name);
	  		$result = self::executeQuery($user,$option);
  		  return $result->fetch(PDO::FETCH_ASSOC);
  		}
  	// fonction qui permet d'ajouter un user à la BDD en verifiant les variables en post 	
  	public function addUser($log,$firstn,$lastn, $birth){
  		$add_u = 'INSERT INTO `user`(`u_login`, `u_prenom`, `u_nom`, `u_date_naissance`,`u_date_inscription`, `u_rang_fk`) VALUES (:u_login,:u_prenom,:u_nom,:u_date_naissance,NOW(),3)';
  		$option  = array('u_login' => $log, 'u_prenom' =>$firstn, 'u_nom' => $lastn, 'u_date_naissance' => $birth );
  		$this->executeQuery($add_u,$option);
  	}
    

}



 ?>