<?php
	require_once '../conexao/dbconfig.php';

	if(isset($_POST['uupdate']))
	{
   	$uid = $_POST['uid'];
		$muname = $_POST['muname'];
		$ue = $_POST['ue'];
		$jd =  $_POST['jd'];

		$stmt = $db_con->prepare("UPDATE users SET user_name=:mun,
															user_email=:ue, joining_date=:jd
    													WHERE user_id=:uid");

    $stmt->bindParam(":mun", $muname);
		$stmt->bindParam(":ue", $ue);
 	  $stmt->bindParam(":jd", $jd);
		$stmt->bindParam(":uid", $uid);
?>

<!DOCTYPE>
<html xmlns="http://www.w3.org/">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loja Virtual</title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>

<body>

<?php

	if($stmt->execute())
	{
		echo '<div id="main2">
					<h1><font color="green">Parabéns!</font></h1>
	        <p><b>Usuário atualizado com Sucesso.</b></p>
					<p><a href="user.php" ><button class="button" >Voltar</button</a></p>
	        </div>';
	}
	else{
		echo "Problema de Consulta";
	}
	}

?>

</body>

</html>
