<?php

	require_once('../class.user.php');
	$user = new USER();

	if(isset($_POST['btn-signup']))
	{
		$uname = strip_tags($_POST['txt_uname']);
		$umail = strip_tags($_POST['txt_umail']);
		$upass = strip_tags($_POST['txt_upass']);

		if($uname=="")
		{
			$error[] = "<b><font color='red'>Forneça um nome!</font></b>";
		}
		else if($umail=="")
		{
			$error[] = "<b><font color='red'>Forneça ID email!";
		}
		else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	// name@example.com
		{
		    $error[] = "<b><font color='red'>Entre com um email válido!</font></b>";
		}
		else if($upass=="")
		{
			$error[] = "<b><font color='red'>Forneça uma senha!</font></b>";
		}
		else if(strlen($upass) < 6)
		{
			$error[] = "<b><font color='red'>Senha precisa de no mínimo 6 caracteres</font></b>";
		}
		else
		{
			try
			{
				$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
				$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
				$row=$stmt->fetch(PDO::FETCH_ASSOC);

				if($row['user_name']==$uname)
				{
					$error[] = "<b><font color='red'>sorry username already taken !</font></b>";
				}
				else if($row['user_email']==$umail)
				{
					$error[] = "<b><font color='red'>sorry email id already taken !</font></b>";
				}
				else
				{
					if($user->register($uname,$umail,$upass))
					{
						$user->redirect('sign-up.php?joined');
					}
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
	}

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loja Virtual</title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />
</head>

<body>
<div id="main2">
	<form method="post" >
  	<h1>Adicionar Usuário</h1>

<?php

	if(isset($error))
	{
		foreach($error as $error)
		{
?>

	<div class="alert alert-danger">
		<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
	</div>

<?php
		}
	}
	else if(isset($_GET['joined']))
	{
?>

	<div class="alert alert-info">
		<i class="glyphicon glyphicon-log-in"></i> &nbsp; Registrado com Sucesso <a href='login.php'>Login</a>
	</div>

<?php
	}
?>

	<input type="text" class="form-control" name="txt_uname" placeholder="Insira um nome" value="<?php if(isset($error)){echo $uname;}?>" />
	<input type="text" class="form-control" name="txt_umail" placeholder="Insira um Email" value="<?php if(isset($error)){echo $umail;}?>" />
	<input type="password" class="form-control" name="txt_upass" placeholder="Insira uma Senha" />
	<input value="CADASTRAR" type="submit" class="button" name="btn-signup">


</form>
</div>

</body>
</html>
