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


<!DOCTYPE>
<html xmlns="http://www.w3.org/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete </title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>
<body>
<?php

	include_once '../conexao/dbconfig.php';

	if(isset($_GET['pid']))
	{
		$id = $_GET['pid'];
		$stmt=$db_con->prepare("DELETE FROM product WHERE pid=:id");
		$stmt->execute(array(':id'=>$id));

		echo '<div id="main2">
						<h1><font color="red">Produto Excluído!</font></h1>
						<p><b>Produto Excluído permanentemente do registro.</b></p>
						<p><a href="product.php" ><button class="button" >Voltar</button</a></p>
					</div>';
	}

?>

<?php

	include_once '../conexao/dbconfig.php';

	if(isset($_GET['myid']))
	{
		$id = $_GET['myid'];
		$stmt=$db_con->prepare("DELETE FROM ordrs WHERE myid=:id");
		$stmt->execute(array(':id'=>$id));

		echo '<div id="main2">
						<h1><font color="red">Pedido Excluído!</font></h1>
						<p><b>Pedido Excluído permanentemente do registro.</b></p>
						<p><a href="order.php" ><button class="button" >Voltar</button</a></p>
					</div>';
	}

?>

<?php

	include_once '../conexao/dbconfig.php';

	if(isset($_GET['mid']))
	{

		$id = $_GET['mid'];
		$stmt=$db_con->prepare("DELETE FROM message WHERE mid=:id");
		$stmt->execute(array(':id'=>$id));

		echo '<div id="main2">
						<h1><font color="red">Mensagem Excluída!</font></h1>
						<p><b>Mensagem Excluída permanentemente do registro.</b></p>
						<p><a href="message.php" ><button class="button" >Voltar</button</a></p>
	        </div>';
	}

?>







</body>
</html>
