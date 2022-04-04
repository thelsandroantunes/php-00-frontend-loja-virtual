<?php
class Database
{
    private $host = "localhost";
    private $db_name = "mydb";
    private $username = "root";
    private $password = "";
    public $conn;

    public function dbConnection()
    {
      $this->conn = null;
      try
      {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "Database Connected";
      }
      catch(PDOException $exception)
      {
        echo "Connection error: " . $exception->getMessage();
      }
      return $this->conn;
    }
  }

  $db_host = "localhost";
  $db_name = "mydb";
  $db_user = "root";
  $db_pass = "";

  try{
    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }

?>
