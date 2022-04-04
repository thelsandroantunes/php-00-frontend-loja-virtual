
<!DOCTYPE>
<html xmlns="http://www.w3.org/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loja Virtual</title>
<link rel="stylesheet" href="style/style1.css" type="text/css"  />
<style>
ul.pagination
{
    text-align:center;
    color:#5DBCD2;
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

</head>
<body>
<div id="main2">
<div id="header"><img src="images/logo.png"></div>
<div id="manu">
  <ul>
    <li><a  href="homelog.php">HOME</a></li>
    <li><a href="member/home.php">MEUS PEDIDOS</a></li>
    <li><a style="background:#5DBCD2; color:#fff;" href="atendimentologsim.php">ATENDIMENTO</a></li>
    <li><a href="../login/logout.php?logout=true">SAIR</a></li>
  </ul>
</div>
<div id="content">

<center>
  <h1 >Contate-nos</h1>
  <form method="post" action="atendimento.php">
    <input type="text"  name="name" placeholder="Nome" required /><br><br>
    <input type="text"  name="email" placeholder="Email" required /><br><br>
    <input type="text"  name="mobile" placeholder="Telefone" required /><br><br>
    <textarea type="text" cols="10" rows="10" name="mssg" placeholder="Mensagem" required /></textarea><br>
    <br>
    <button  type="submit" name="ccontact"  class="button"> ENVIAR </button>
  </form>
  <br><br>

<?php
  require_once 'conexao/dbconfig.php';

  if(isset($_POST['ccontact']))
  {

		$name = $_POST['name'];
		$mb = $_POST['mobile'];
		$em = $_POST['email'];
		$mssg = $_POST['mssg'];
		$cdate = date('Y-m-d');

		try
    {

			$stmt = $db_con->prepare("INSERT INTO message(name, mobile, email, mssg,cdate)
			VALUES(:nm, :mb, :em, :sms,:cd)");

			$stmt->bindParam(":nm", $name);
			$stmt->bindParam(":mb", $mb);
			$stmt->bindParam(":em", $em);
			$stmt->bindParam(":sms", $mssg);
			$stmt->bindParam(":cd", $cdate);

			if($stmt->execute())
			{
				echo '<b><font color="green">Parabéns! <br>Sua mensagem foi enviado com sucesso. Entraremos em contato com você em breve.</font></b>';
			}
			else
      {
				echo "Problema de Consulta";
			}
  	}
  	catch(PDOException $e)
    {
  		echo $e->getMessage();
  	}
  }

 ?>

</center>
<br>
</div>
<div id="footer">
  <center>
    <p> Acesse Nossas Mídias Sociais </p>
    <p><img src="images/facebook.png"> <img src="images/twitter.png">  <img src="images/youtube.png"></p>
  </center>
    <b>  Copyrights©2018 Protótipo de Loja Virtual - Thelsandro Antunes.</b>
</div>
</div>

</body>
</html>
