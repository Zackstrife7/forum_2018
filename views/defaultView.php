<!DOCTYPE html>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum_Message_conversation</title>
    

</head>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="?">Zack'S Website</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Utilisateurs
            <span class="caret"></span></a>
                <ul class="dropdown-menu">
                      <li><a href="?a=user&a=login" title="">Connexion</a></li>
                      <li><a href="?c=user&a=signin" title="">S'inscrire</a></li>
                </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Conversations
            <span class="caret"></span></a>
                <ul class="dropdown-menu">
                      <li><a href="?c=conversation&a=showConversations" title="">Tous les conversations</a></li>
                      <li><a href="?c=conversation&a=addConversation" title="">Ajouter une conversation</a></li>
                </ul>
          </li>
        </ul>
      </div>

</nav> 
      <div class="container-fluid">
          <label for="">Utilisateur actuellement connecté :</label>  
          <table class="table table-info">
              <thead>
                  <th scope="col">Id</th>
                  <th scope="col">Pseudo</th>
                  <th scope="col">Nom prenom</th>
                  <th scope="col">Rang</th>
              </thead>
        <?php if (isset($_SESSION['user'])) 
        {
             echo'
              <tbody>  
                <tr>
                     <td>'.$_SESSION['user']['u_id'].'</td>
                    <td>'.$_SESSION['user']['u_login'].'</td> 
                    <td>'.$_SESSION['user']['u_nom'].' '.$_SESSION['user']['u_prenom'].'</td> 
                    <td>'.$_SESSION['user']['r_libelle'].'</td> 

                </tr>
              </tbody>
              <a href="?destroy"><button>Se déconnecter</button></a>
              ';              
                ;
           
        }
?>

     
          </table>
    </div>
</body>
</html>

 


                   
                    


        
