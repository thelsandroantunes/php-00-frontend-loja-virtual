
<?php

	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();


	$user_id = $_SESSION['user_session'];


	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $uid = $userRow['user_id'];

	if(!$_SESSION['user_session'])
	{
		header("location: login/denied.php");
	}

?>

<!DOCTYPE>
<html xmlns="http://www.w3.org/">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adicionar Membro Novo</title>
<link rel="stylesheet" href="style/style.css" type="text/css"  />
</head>

<body>

<?php
  require_once 'conexao/dbconfig.php';

	//**********************************************
	$pid = $_GET['pid'];

	$stmt = $db_con->prepare("SELECT * FROM product WHERE pid = $pid");
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);

	$pr = $row['pr'];
	$name = $row['name'];
	$img = $row['img'];
	//**********************************************
?>


<div id="main2">
<div id="header"><img src="images/logo.png"></div>
	<form method='post'  action="admin/order-alert.php">
  <table class='table table-bordered'>
		<tr>
			<td colspan="2"><h1 align="center">Faça seu Pedido</h1></td>
		</tr>
		<tr>
			<td>Preço</td>
			<td>
				<input type='text' name='pr' readonly="readonly" value="<?php  echo $pr ?>"/>
				<input type='hidden' name='img' value="<?php echo $img ?>"  />
				<input type='hidden' name='uid' value="<?php echo $uid ?>"  />
			</td>
		</tr>
    <tr>
    	<td>Pedido</td>
      <td><input type='text' name='ordr' readonly="readonly" value="<?php  echo $name ?>"  placeholder='' required /></td>
    </tr>
		<tr>
			<td>Nome</td>
			<td><input type='text' name='name' value="<?php echo $userRow['user_name']; ?>"  placeholder='' required /></td>
		</tr>
		<input type='hidden' name='cdate'  value="<?php echo date('Y-m-d'); ?>" class='form-control' placeholder='' >
		<input type='hidden' name='img'  value="<?php echo $img ?>" class='form-control' placeholder='' >
		<tr>
			<td>Telefone</td>
			<td><input type='text' name='mobile' placeholder='Inserir Telefone' ></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type='text' name='email'   value="<?php echo $userRow['user_email']; ?>" class='form-control' placeholder='Inserir Email'>
		</tr>
		<tr>
			<td>Endereço</td>
			<td><textarea type='text' name='addr' placeholder='Inserir Endereço' ></textarea></td>
		</tr>
		<tr>
			<td>Questão:
				<?php

					$a = rand(0, 9);
					$b = rand(0, 9);

				?> &nbsp;<span class="red"><?php echo "$a + $b"; ?> =</span><br>
				<input value="<?php echo $a ?>"  name="a" type="hidden">
				<input value=" <?php echo $b ?>" name="b"  type="hidden">
			</td>
			<td> <input type="text"  placeholder='answer here' name="ans" /></td>
		</tr>
		<tr>
    	<td></td>
			<td><button type="submit" class="button" > Peça Agora </button></td>
    </tr>
    </table>
	</form>
</div>
</div>

</body>
</html>
