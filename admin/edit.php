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

	include_once '../conexao/dbconfig.php';

	if(isset($_GET['myid']))
	{
		$id = $_GET['myid'];
		$stmt=$db_con->prepare("SELECT * FROM ordrs WHERE myid=:id");
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
	}

?>

<!DOCTYPE>
<html xmlns="http://www.w3.org/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loja Virtual</title>
<link href="../style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main2">
	<div id="header"><img src="../images/logo.png"></div>
	<form method='post' action="update.php">
		<table class='table table-bordered'>
		<tr>
    	<td colspan="2"><h1 align = "center">Editar Pedido </h1></td>
		</tr>
		<input type='hidden' name='myid' value="<?php echo $row['myid']; ?>" />
		<tr>
			<td>Nome</td>
			<td><input type='text' name='name' value="<?php echo $row['name']; ?>" class='form-control' placeholder='' /></td>
		</tr>
		<tr>
			<td>Telefone</td>
			<td><input type='text' name='mobile'  value="<?php echo $row['mobile']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type='text' name='email'  value="<?php echo $row['email']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
			<td>Endereço</td>
			<td><input type='text' name='addr'  value="<?php echo $row['addr']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
			<td>Pedido</td>
			<td><input type='text' name='ordr'  value="<?php echo $row['ordr']; ?>" class='form-control' placeholder=''></td>
		</tr>
		<tr>
			<td>Data</td>
			<td><input type='text' name='cdate' value="<?php echo $row['cdate']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
			<td>Status: </td>
			<td> <div class="selector"> <select name="sts" >
			<option value="<?php echo $row['sts']; ?>"><?php echo $row['sts']; ?></option>
			<option value="Pending">Pendente</option>
			<option  value="Dispatched">Despachado</option>
			<option  value="Cancelled">Cancelado</option>
			</select>
		</tr>
		<tr>
    	<td></td>
			<td><button type="submit"  name="oupdate" class="button" >Atualizar</button></td>
    </tr>
    </table>
	</form>
</div>

</body>
</html>
