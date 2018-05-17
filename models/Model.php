<?php 
//creation du modele par default
	abstract  class Model{
		
		public function executeQuery($sql /*=> requete quon veu faire*/,$option =array()/* comme un placeholder, contient toutes les données poster dans le form que l'on va lier et envoyer*/ )
     {
 		try
 		{	
     		if (empty($option)) 
	     	{
	     		return SPDO::getInstance()->query($sql); /* retourner le cas de cette ligne*/
	     	}
	     	else
	     	{
	     		if(($statement = SPDO::getInstance()->prepare($sql))!== false)
	     		{
	     			
	     			foreach ($option as $key => $value) 
	     			{
	     				if($statement->bindValue($key,$value)=== false)
	     				{
	     					return false;
	     				}
	     			}
	     			if ($statement->execute()!==false) 
	     			{
	     				return $statement;
	     			}
	     		}

	     	}
	     	return false;
	    }
		catch(PDOException $e)
		{
			return false;
		}
	}


}


 ?>