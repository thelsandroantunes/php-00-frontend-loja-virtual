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
    <li><a style="background:#5DBCD2; color:#fff;" href="index.php">HOME</a></li>
    <li><a href="pedido.php">MEUS PEDIDOS</a></li>
    <li><a href="atendimento.php">ATENDIMENTO</a></li>
    <li><a href="login/login.php">ENTRAR</a></li>
  </ul>
</div>
<div id="content">
  <?php
    require_once 'conexao/dbconfig.php';

    //**********************************************
    $pid = $_GET['pid'];

  	$stmt = $db_con->prepare("SELECT * FROM product WHERE pid = $pid");
  	$stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    $img = $row['img'];
    $name =  $row['name'];
    $des = $row['des'];
    $pr = $row['pr'];
    $cdate =  $row['cdate'];


    echo '
          <div class="item1">
            <span><img src="'.$img.'"></span>
          </div>';

    echo '
          <div class="item1">
            <button class="button2"><font color="#ffffff" size="4"> <b>Preço '.$pr.' </b></font></button><br>
            <h2>'.$name.'</h2>
            <span><b>Descrição </b><br>'.$des.'</span><br><br>
            <b><b>Data de Publicação </b>'.$cdate.'</b><br>
            <a href="add-order.php?pid='.$pid.'" ><button class="button2"><font color="#ffffff" size="4"> <b> COMPRAR </b></font></button><br></a>
          </div>';
    //**********************************************
  ?>
</div>
</div>
</div>
<div id="footer">
  <center>
    <p>Acesse Nossas Mídias Sociais </p>
    <p><img src="images/facebook.png"> <img src="images/twitter.png">  <img src="images/youtube.png"></p>
  </center>
  <b>  Copyrights©2018 Protótipo de Loja Virtual - Thelsandro Antunes.</b>
</div>
</div>

</body>
</html>
