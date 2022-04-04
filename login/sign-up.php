<?php

  session_start();
  require_once('../class.user.php');
  $user = new USER();

  if($user->is_loggedin()!="")
  {
  	$user->redirect('../admin/admin.php');
  }

  if(isset($_POST['btn-signup']))
  {
  	$uname = strip_tags($_POST['txt_uname']);
  	$umail = strip_tags($_POST['txt_umail']);
  	$upass = strip_tags($_POST['txt_upass']);

  	if($uname=="")
    {
  		$error[] = "<b><font color='red'>Forneça seu Nome!</font></b>";
  	}
  	else if($umail=="")
    {
  		$error[] = "<b><font color='red'>Forneça seu Email!";
  	}
  	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))
    {
  	  $error[] = "<b><font color='red'>Entre com Email Válido!</font></b>";
  	}
  	else if($upass=="")
    {
  		$error[] = "<b><font color='red'>Forneça sua Senha !</font></b>";
  	}
  	else if(strlen($upass) < 6)
    {
  		$error[] = "<b><font color='red'>Senha deve possuir no mínimo 6 caracteres</font></b>";
  	}
  	else
  	{
  		try
  		{
  			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
  			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
  			$row=$stmt->fetch(PDO::FETCH_ASSOC);

  			if($row['user_name']==$uname) {
  				$error[] = "<b><font color='red'>sorry username already taken !</font></b>";
  			}
  			else if($row['user_email']==$umail) {
  				$error[] = "<b><font color='red'>sorry email id already taken !</font></b>";
  			}
  			else
  			{
  				if($user->register($uname,$umail,$upass)){
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
<html xmlns="http://www.w3.org/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loja Virtual</title>
<link rel="stylesheet" href="../style/style.css" type="text/css"  />

<script language="javascript">

function ocultar(obj)
{
  if (document.getElementById("i4").checked)
  {
    document.getElementById('i1').style.display="none";
    document.getElementById('i2').style.display="none";
    document.getElementById('i3').style.display="none";
    document.getElementById('i4').style.display="none";
    document.getElementById('i5').style.display="none";
  }
}

</script>

</head>
<body>

<div id="main2">
  <div id="header"><img src="../images/logo.png"></div>
  <form method="post" >
      <h1>CADASTRO</h1>

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
            <i class="glyphicon glyphicon-log-in"></i> &nbsp; <font color='green'>REGISTRADO COM SUCESSO! </font>
            <p> Faça seu <a href="login.php"> Login </a> ou ir para <a href="../index.php">HOME</a></p>
          </div>
      <?php
        }
        else
        {
      ?>
          <input id="i1" type="text" class="form-control" name="txt_uname" placeholder="Insira um Nome" value="<?php if(isset($error)){echo $uname;}?>" />
          <input id="i2"  type="text" class="form-control" name="txt_umail" placeholder="Insira um Email" value="<?php if(isset($error)){echo $umail;}?>" />
          <input id="i3"  type="password" class="form-control" name="txt_upass" placeholder="Insira uma Senha" />
          <input id="i4"  checked="checked" value="CADASTRAR" type="submit" class="button" name="btn-signup" onclick="ocultar(this)"/>

          <p id="i5" > Tenho uma conta! <a href="login.php"> ENTRAR </a> ou ir <a href="../index.php">HOME</a></p>
      <?php
        }
      ?>
  </form>
</div>

</body
</html>
