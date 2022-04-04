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
		//echo "Você é Administrador";
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
<title>Admin</title>
<link href="../style/style1.css" rel="stylesheet" type="text/css">

<!-- Javascript goes in the document HEAD -->
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){

		var table = document.getElementById(id);
		var rows = table.getElementsByTagName("tr");

		for(i = 0; i < rows.length; i++){
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	border-width: 1px;
	border-color:  #ddd;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #ddd;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #ddd;
}
.oddrowcolor{
	background-color:#fcfcfc;
}
.evenrowcolor{
	background-color:#e0dbdb;
}
</style>

<!-- Table goes in the document BODY -->



</head>

<body>

<div id="main3">
<div id="header"><img src="../images/logo.png"></div>
<center>
	<div id="manu">
	<ul>
	<li><a href="admin.php" >HOME</a></li>
	<li><a href="user.php" >USUÁRIO</a></li>
	<li><a href="product.php" >PRODUTO</a></li>
	<li><a href="order.php" >PEDIDO</a></li>
	<li><a href="message.php" >MENSAGEM</a></li>
	<li><a href="../login/logout.php?logout=true" >SAIR</a></li>
	</ul>
	</div>
</center>
<div id="content">

<h1><button class="button">Bem-vindo <?php //echo $userRow['user_name']; ?></button></h1>

<p> Neste aplicativo da web, o administrador pode acessar recursos avançados, como abaixo. </p>
<p>1. Adicionar, Editar e Excluir Produtos</p>
<p>2. Adicionar, Editar e Excluir Pedidos</p>
<p>3. Gerenciar Pedidos</p>


</div>


</div>

<div id="footer3">
	<center>
	      <p> Acesse Nossas Mídias Sociais </p>
	      <p><img src="../images/facebook.png"> <img src="../images/twitter.png">  <img src="../images/youtube.png"></p>
				<b>  Protótipo de Loja Virtual - 2018 -Thelsandro Antunes.</b>
	</center>

</div>
</div>

</body>
</html>
