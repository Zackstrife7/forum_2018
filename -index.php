	<!-- INTEGRATION Css bootstrap -->
	 <link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/bootstrap.css">
   <!-- integration JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 

<?php 


session_start();
require_once('lib/SPDO.php');

if (isset($_GET['destroy'])) 
{
	unset($_SESSION['user']);
	header('location:-index.php');
	exit();

}

	if (isset($_GET['c'])) 
	{
		$bundle = ucwords($_GET['c']);
	}
	else{
		$bundle = 'User';
	}

	if (file_exists('controllers/'.$bundle.'Controller.php')) 
	{
		require_once('controllers/'.$bundle.'Controller.php');
		$controller= $bundle .'Controller';

		$class = new $controller;

		if (isset($_GET['a'])) 
		{
			$method = $_GET['a'];
		}else{
			$method = 'default';
		}
		$method .= 'Action';

		if (method_exists($class, $method)) 
		{
			
			$class->$method();
			
		}
	}
			

?>



