<?php

	require_once("../session.php");

	require_once("../class.user.php");
	$auth_user = new USER();

	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $id = $userRow['user_id'];
	if ($id == 1){}
	else
	{
		header("location: ../member/home.php");
	}

	if(!$_SESSION['user_session'])
	{
		header("location: ../login/denied.php");
	}

?>


<?php

	require_once '../conexao/dbconfig.php';

	if(isset($_POST['name']))
	{

  	$pid = $_POST['pid'];
		$name = $_POST['name'];
		$des = $_POST['des'];
		$pr =  $_POST['pr'];
		$cdate = $_POST['cdate'];
		$mg = $_POST['img'];

		$stmt = $db_con->prepare("UPDATE product SET img=:mg, name=:en,
			 												des=:ds, pr=:pr,  cdate=:cd
 															WHERE pid=:id");

 	  $stmt->bindParam(":mg", $mg);
		$stmt->bindParam(":en", $name);
		$stmt->bindParam(":ds", $des);
		$stmt->bindParam(":pr", $pr);
		$stmt->bindParam(":cd", $cdate);
		$stmt->bindParam(":id", $pid);

		if($stmt->execute())
		{
			//echo "<p>Product Successfully updated<p>";
		}
		else
		{
			echo "Query Problem";
		}
	}

?>

<?php

	require_once("../session.php");

	require_once("../class.user.php");
	$auth_user = new USER();

	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>




<!DOCTYPE>
<html xmlns="http://www.w3.org/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loja Virtual</title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>
<body>
<div id="main2">
	<h1><font color='green'>Parabéns!</font></h1>
	<p><b>Produto atualizado com Sucesso.</b></p>
	<p><a href="product.php" ><button class="button" >Voltar</button</a></p>
</div>

</body>
</html>
