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

		$myid = $_POST['myid'];
		$name = $_POST['name'];
		$sts = $_POST['sts'];
		$email =  $_POST['email'];
		$cdate = $_POST['cdate'];
		$mobile = $_POST['mobile'];
		$addr = $_POST['addr'];
		$ordr = $_POST['ordr'];

		$stmt = $db_con->prepare("UPDATE ordrs SET  name=:en,
															sts=:st, email=:em,  cdate=:cd, mobile=:mb, addr=:ad, ordr=:rdr
 															WHERE myid=:myid");

		$stmt->bindParam(":en", $name);
		$stmt->bindParam(":st", $sts);
		$stmt->bindParam(":em", $email);
		$stmt->bindParam(":cd", $cdate);
		$stmt->bindParam(":ad", $addr);
		$stmt->bindParam(":rdr", $ordr);
		$stmt->bindParam(":mb", $mobile);
		$stmt->bindParam(":myid", $myid);

		if($stmt->execute())
		{
			echo "<p>Pedidos atualizados com Sucesso<p>";
		}
		else
		{
			echo "Problema de Consulta";
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
  <p><b>Pedido atualizado com Sucesso.</b></p>
	<p><a href="order.php" ><button class="button" >Voltar</button</a></p>
</div>

</body>
</html>
