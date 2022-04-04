<?php
  session_start();
  include_once("../class.user.php");

  $login = new USER();

  if($login->is_loggedin()!="")
  {
  	$login->redirect('../admin/admin.php');
  }

  if(isset($_POST['btn-login']))
  {
  	$uname = strip_tags($_POST['txt_uname_email']);
  	$umail = strip_tags($_POST['txt_uname_email']);
  	$upass = strip_tags($_POST['txt_password']);

  	if($login->doLogin($uname,$umail,$upass))
  	{
  		$login->redirect('../admin/admin.php');
  	}
  	else
  	{
  		$error = "<b><font color='red'>Dados Errados !</font></b>";
  	}
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
<div id="header"><img src="../images/logo.png"></div>
  <form  method="post" >

    <h1 >Login</h1>

    <?php
      if(isset($error))
      {
    ?>
    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
    <?php
      }
    ?>

    <input type="text"  name="txt_uname_email" placeholder="Nome ou Email" required />
    <input type="password"  name="txt_password" placeholder="Sua Senha" />
    <input value="ENTRAR" type="submit" name="btn-login" class="button">
    <p>Não possui conta! <a href="sign-up.php">CADASTRE-SE</a> ou ir para <a href="../index.php">HOME</a></p>

  </form>
</div>

</body>
</html>
