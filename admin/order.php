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
table.altrowstable {
	border-width: 1px;
	border-color:  #ddd;
	font-size: 14px;
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

ul.pagination {
    text-align:center;
    color:#5DBCD2;
}
ul.pagination li {
    display:inline;
    padding:0 3px;
}
ul.pagination a {
    color:#5DBCD2;
    display:inline-block;
    padding:5px 10px;
    border:1px solid #5DBCD2;
    text-decoration:none;
}
ul.pagination a:hover,
ul.pagination a.current {
    background:#5DBCD2;
    color:#fff;
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
<br>
<div id="content">
	<h2><a class="button" href="../index.php"> Adicionar Pedido</a> Acesso Restrito ao Administrador </h2>
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
        <th>Editar</th>
        <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
			<?php

					require_once '../conexao/dbconfig.php';

					include_once('../conexao/conexaox.php');
					include_once('../funcao/funcaox.php');

					$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
					if ($page <= 0) $page = 1;

					$per_page = 5; // Set how many records do you want to display per page.
					$startpoint = ($page * $per_page) - $per_page;
					$statement = "`ordrs` ORDER BY `myid` ASC"; // Change `records` according to your table name.
					$results = mysqli_query($conDB,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

					if (mysqli_num_rows($results) != 0)
					{
						// displaying records.
						while($row = mysqli_fetch_array($results))
						{
				?>
			<tr>
				<td><?php echo $row['myid']; ?></td>
				<td><img with="80" height="80" src="../<?php echo $row['img']; ?>"></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['mobile']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['addr']; ?></td>
				<td><?php echo $row['ordr']; ?></td>
				<td><?php echo $row['cdate']; ?></td>
				<td><?php echo $row['sts']; ?></td>
				<td align="center">
					<a   href="edit.php?myid=<?php echo $row['myid']; ?>" title="Edit">
					<img src="../images/edit.png" width="40px" />
          </a>
				</td>
			<td align="center">
				<a   href="delete.php?myid=<?php echo $row['myid']; ?>" title="Delete">
				<img src="../images/delete.png" width="40px" />
        </a>
			</td>
			</tr>
			<?php
						}
			?>
      </tbody>
    </table>
	</center>
	<br>
		<?php
					}
					else
					{
						echo "no record";
					}
					// displaying paginaiton.
					echo pagination($statement,$per_page,$page,$url='?');
			?>


<div id="footer3">
	<center>
	      <p> Acesse Nossas Mídias Sociais </p>
	      <p><img src="../images/facebook.png"> <img src="../images/twitter.png">  <img src="../images/youtube.png"></p>
	</center>
	    <b>  Copyrights©2018 Protótipo de Loja Virtual - Thelsandro Antunes.</b>
</div>
</div>

</body>
</html>
