<?php

	require_once("../session.php");

	require_once("../class.user.php");
	$auth_user = new USER();

	$user_id = $_SESSION['user_session'];

	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
  $uid = $userRow['user_id'];

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
table.altrowstable
{
	border-width: 1px;
	border-color:  #ddd;
	font-size: 14px;
	border-collapse: collapse;
}
table.altrowstable th
{
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #ddd;
}
table.altrowstable td
{
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #ddd;
}
.oddrowcolor
{
	background-color:#fcfcfc;
}
.evenrowcolor{
	background-color:#e0dbdb;
}

ul.pagination
{
    text-align:center;
    color:#1f447f;
}
ul.pagination li
{
    display:inline;
    padding:0 3px;
}
ul.pagination a
{
    color:#5DBCD2;
    display:inline-block;
    padding:5px 10px;
    border:1px solid #5DBCD2;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current
{
    background:#5DBCD2;
    color:#fff;
}
</style>

<!-- Table goes in the document BODY -->

</head>

<body>
<div id="main3">
<div id="header"><img src="../images/logo.png"></div>
<div id="manu">
	<ul>
		<li><a href="../homelog.php" style="background:#5DBCD2; color:#fff;" >HOME</a></li>
		<li><a href="../login/logout.php?logout=true" >SAIR</a></li>
	</ul>
</div>
	<br>
<div id="content">
	<h2>[Detalhe dos Pedidos] </h2>
	<center>
		<table class="altrowstable" id="alternatecolor">
    	<thead>
      	<tr>
	        <th>ID</th>
	        <th>Imagem</th>
	        <th>Nome</th>
					<th>Telefone</th>
					<th>Email</th>
					<th>Endereço</th>
					<th>Pedido</th>
			    <th>Data</th>
					<th>Status</th>
        </tr>
      </thead>
      <tbody>
				<?php
					require_once '../conexao/dbconfig.php';

					$stmt = $db_con->prepare("SELECT * FROM ordrs WHERE uid = $uid ORDER BY myid DESC");
					$stmt->execute();

					while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
				?>
						<tr>
							<td><?php echo $row['myid']; ?></td>
							<td><img with="50" height="50" src="../<?php echo $row['img']; ?>"></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['mobile']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['addr']; ?></td>
							<td><?php echo $row['ordr']; ?></td>
							<td><?php echo $row['cdate']; ?></td>
							<td><?php echo $row['sts']; ?></td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</center>
	<br>
	<?php
	?>

<div id="footer3">
	<center>
		<p> Acesse Nossas Mídias Sociais </p>
		<p><img src="../images/facebook.png"> <img src="../images/twitter.png">  <img src="../images/youtube.png"></p>
		<b>  Protótipo de Loja Virtual - 2018 - Thelsandro Antunes.</b>
	</center>

</div>

</body>
</html>
