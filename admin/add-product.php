<?php

	require_once("../session.php");

	require_once("../class.user.php");
	$auth_user = new USER();

	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $id = $userRow['user_id'];
	if ($id == 1)
	{
	}
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
<title>Loja Virtual</title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>
<body>

<div id="main2">
	<form method='post'  action="create.php"  enctype="multipart/form-data">
  	<table class='table table-bordered'>
		<tr>
			<td colspan="2">	<h1> Inserir Novo Produto</h1></td>
		</tr>
		<tr>
			<td>Imagem</td>
			<td >  <input type="file" name="fileToUpload" id="fileToUpload"></td>
		</tr>
  	<tr>
    	<td>Nome</td>
      <td><input type='text' name='name'  placeholder='' required /></td>
    </tr>
		<input type='hidden' name='cdate'  value="<?php echo date('Y-m-d'); ?>" class='form-control' placeholder='' >
		<tr>
			<td>Descrição</td>
			<td><textarea type='text' name='des' placeholder='Descreve sobre o Produto ' ></textarea></td>
		</tr>
		<tr>
			<td>Preço</td>
			<td><input type='text' name='pr' class='form-control' placeholder='Insira o Valor'>
		</tr>
		<tr>
			<td>Questão:
	    <?php

				$a = rand(0, 9);
				$b = rand(0, 9);

			?> &nbsp;<span class="red"><?php echo "$a + $b"; ?> =</span><br>
      <input value="<?php echo $a ?>"  name="a" type="hidden">
			<input value=" <?php echo $b ?>" name="b"  type="hidden"></td>
			<td> <input type="text"  placeholder='Responda aqui' name="ans" /></td>
		</tr>
		<tr>
    	<td></td>
			<td><button type="submit" class="button" > ADICIONAR </button></td>
    </tr>
		</table>
	</form>
</div>
</div>

</body>
</html>
