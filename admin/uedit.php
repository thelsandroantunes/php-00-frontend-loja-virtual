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

	if(isset($_GET['uid']))
	{
		$id = $_GET['uid'];
		$stmt=$db_con->prepare("SELECT * FROM users WHERE user_id=:uid");
		$stmt->execute(array(':uid'=>$id));
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
	<form method='post' action="uupdate.php">
  <table class='table table-bordered'>
		<tr>
	    <td colspan="2"><h1>Editar Usuário </h1></td>
		</tr>
		<input type='hidden' name='uid' value="<?php echo $row['user_id']; ?>" />
		<tr>
			<td>Nome</td>
			<td><input type='text' name='muname' value="<?php echo $row['user_name']; ?>" class='form-control' placeholder='' /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type='text' name='ue'  value="<?php echo $row['user_email']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
			<td>Data</td>
			<td><input type='text' name='jd'  value="<?php echo $row['joining_date']; ?>"  class='form-control' placeholder='' ></td>
		</tr>
		<tr>
    	<td></td>
			<td><button type="submit" name="uupdate" class="button" >ATUALIZAR</button></td>
    </tr>
  </table>
	</form>
</div>
</body>

</html>
