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
    <li><a style="background:#5DBCD2; color:#fff;" href="homelog.php">HOME</a></li>
    <li><a href="member/home.php">MEUS PEDIDOS</a></li>
    <li><a href="atendimentologsim.php">ATENDIMENTO</a></li>
    <li><a href="../login/logout.php?logout=true">SAIR</a></li>
  </ul>
</div>


<div id="content">
  <?php
    require_once 'conexao/dbconfig.php';

    include_once('conexao/conexaox.php');
    include_once('funcao/funcaox.php');

    $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
    if ($page <= 0) $page = 1;
    $per_page = 6; // Set how many records do you want to display per page.
    $startpoint = ($page * $per_page) - $per_page;
    $statement = "`product` ORDER BY `pid` ASC";

    //**********************************************
    $stmt = $db_con->prepare("SELECT * FROM product ORDER BY pid DESC  LIMIT {$startpoint} , {$per_page} ");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {

      $img = $row['img'];
      $pid = $row['pid'];
      $pr = $row['pr'];

      echo '
            <div class="item">
              <button class="button">Preço '.$pr.' </button><br>
              <span><img src="'.$img.'"><span><br>
              <span class="more"><a href="detail.php?pid='.$pid.'" >Mais Detalhes</a></span>
              <span class="order"><a href="add-order.php?pid='.$pid.'" >Peça Agora</a></span>
            </div>';
    }
    //**********************************************
  ?>

  <br>
  <br>
</div>
<div id="nav">
  <br>
  <center>
    <?php
      echo pagination($statement, $per_page, $page, $url='?');
    ?>
  </center>
  <br>
</div>

<div id="footer">
<center>
  <p> Acesse Nossas Mídias Sociais </p>
  <p><img src="images/facebook.png"> <img src="images/twitter.png">  <img src="images/youtube.png"></p>
  <b>Protótipo de Loja Virtual - 2018 - Thelsandro Antunes</b>
</center>

</div>
</div>

</body>
</html>
