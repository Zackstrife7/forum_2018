<?php 

	class ConversationModel extends Model
	{
		
		

		public function GetAll(){
			$conversation = 'SELECT `c_id`,DATE_FORMAT(`c_date`, "%d/%m/%Y") as date , DATE_FORMAT(`c_date`, "%H:%i:%s") as heure, `c_termine`,COUNT(`m_conversation_fk`) as nbr_mess
							FROM `conversation` 
							LEFT JOIN `message`
							ON `c_id` = `m_conversation_fk`
							GROUP BY  `c_id`';
			$results = $this->executeQuery($conversation);
			return $results->fetchAll();				
		}
		// fonction pour aller chercher tout les messages d'une conversation 
		public function getMess($id,$page,$tri){
			if ($tri === 'm_date' || $tri === 'm_heure' || $tri === 'm_id' || $tri === 'm_auteur' ) {
				$tri = $tri ;
			}
			else{
				return false;
			}
			$limit = 20 ;
			$offset = $page * $limit ;
			$messages =" SELECT DATE_FORMAT (`m_date`,'%d/%m/%Y') as m_date, DATE_FORMAT(`m_date`,'%k:%i:%S') as m_heure, CONCAT(`u_nom`,`u_prenom`)  as m_auteur ,`m_id`, `m_contenu` FROM `conversation` 
			INNER JOIN `message` ON `c_id`=`m_conversation_fk` 
			INNER JOIN `user` ON `m_auteur_fk` = `u_id` 
			WHERE `c_id`=$id 
			GROUP BY $tri DESC
			LIMIT $limit
			OFFSET $offset"; 
			$options = array('c_id'=>$id);
			$all_message = $this->executeQuery($messages,$options);
			return $all_message->fetchAll();
		}
		// Fonction qui ajoute un message  dans une connversation au préalable choisit 
		public function insert($content,$user,$convers){
			$preparemess = 'INSERT INTO `message`(`m_contenu`,`m_date`,`m_auteur_fk`,`m_conversation_fk`) 
							VALUES ( :m_contenu ,NOW(),:m_auteur_fk,:m_conversation_fk) ';
			$options = array('m_contenu' => $content ,'m_auteur_fk' => $user,'m_conversation_fk' => $convers );
			$this->executeQuery($preparemess,$options);

		}
		// ajoute une conversation 
		public function addConv(){
			$conv = 'INSERT INTO `conversation`( `c_date`, `c_termine` ) VALUES( "' . date( 'Y-m-d H:i:s' ) . '", 0 )';
			$new = $this->executeQuery($conv);
		

            return false;
			
		}
		// 
		public function getConv($id){
			$getC = 'SELECT `c_id`, `c_date`, `c_termine`,COUNT(m_conversation_fk) as nbr_m
			FROM `conversation`
			INNER JOIN `message`
			ON  `c_id` = `m_conversation_fk`
			WHERE `c_id`= :id';
			$option = array('id' => $id) ;
			$result = self::executeQuery($getC,$option);
			return $result->fetch(PDO::FETCH_ASSOC);
		}


		public function delConv($id){
			$getC='DELETE FROM `conversation` WHERE `c_id` =:id';
			$option = array('id' => $id); 
			 return $del = $this->executeQuery($getC,$option);
		}

	}



 ?>