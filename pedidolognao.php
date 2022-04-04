<!DOCTYPE>
<html xmlns="http://www.w3.org/">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loja Virtual</title>
<link rel="stylesheet" href="style/style1.css" type="text/css"  />
</head

<body>

  <div id="main2">
  <div id="header"><img src="images/logo.png"></div>
  <div id="manu">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a style="background:#5DBCD2; color:#fff;" href="pedidolognao.php">PROCURAR</a></li>
      <li><a href="atendimento.php">ATENDIMENTO</a></li>
      <li><a href="login/login.php">ENTRAR</a></li>
    </ul>
  </div>
  <div id="content">

<center>
  <form method='post'  action="pedidolognao.php">
    <table >
    <tr>
       <td colspan="2">	<h1>Encontre seu Produto </h1></td>
    </tr>
    <tr>
       <td>Código</td>
       <td><input type='text' name='search'   placeholder='' required /></td>
    </tr>
    <tr>
      <td></td>
      <td> <button type="submit" class="button" > RASTREAR </button></td>
    </tr>
    </table>
  </form>
</center>
<br><br>

<?php

  require_once 'conexao/dbconfig.php';

  //**********************************************
  require_once 'conexao/dbconfig.php';

  if(isset($_GET['myid']))
  {
    $myid = $_GET['myid'];

    $stmt = $db_con->prepare("SELECT * FROM ordrs WHERE myid = $myid");
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    $img = $row['img'];
    $name =  $row['name'];
    $ordr = $row['ordr'];
    $pr = $row['pr'];
    $cdate =  $row['cdate'];
    $sts = $row['sts'];

    echo '<div class="item1">
            <span><img src="'.$img.'"><span>
          </div>';

    echo '<div class="item1">
           <button class="button"> Preço '.$pr.'</button><br>
           <span><b>Código</b><br>'.$myid.'<span><br>
           <span><b>Título</b><br>'.$name.'<span><br>
           <span><b>Descrição</b><br>'.$ordr.'<span><br>
           <b>Data de Solicitação</b><br>'.$cdate.'
           <button class="button"> '.$sts.' </button>
          </div>';
  }

  if(isset($_POST['search']))
  {
    $myid = $_POST['search'];

    $stmt = $db_con->prepare("SELECT * FROM ordrs WHERE myid = $myid");
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    $img = $row['img'];
    $name =  $row['name'];
    $ordr = $row['ordr'];
    $pr = $row['pr'];
    $cdate =  $row['cdate'];
    $sts = $row['sts'];


  echo '<div class="item1">
          <span><img src="'.$img.'"><span>
        </div>';

  echo '<div class="item1">
          <button class="button2"><font color="#ffffff" size="4"> <b> Preço '.$pr.'</b></font></button><br>
          <span><b>Código</b><br>'.$myid.'<span><br>
          <span><b>Título</b><br>'.$name.'<span><br>
          <span><b>Descrição</b><br>'.$ordr.'<span><br>
          <b>Data de Solicitação</b><br>'.$cdate.'
          <button class="button2"><font color="#ffffff" size="4"> <b> '.$sts.' </b></font></button>
        </div>';
  }
  //**********************************************
?>


  </div>
  </div>
  </div>
  <div id="footer">
    <center>
      <p>Conheça Nossas Mídias Sociais </p>
      <p><img src="images/facebook.png"> <img src="images/twitter.png">  <img src="images/youtube.png"></p>
      <b> Protótipo de Loja Virtual - 2018 - Thelsandro Antunes.  </b>
    </center>

  </div>
  </div>

</body>
</html>
