<?php
class Database
{
  private $host = 'localhost';
  private $db_name = 'db_extensiones';
  private $username = 'root';
  private $password = '';
  private $conn;

  // Constructor para establecer la conexión al instanciar la clase
  public function __construct()
  {
    $this->getConnection();
  }

  // Método para obtener la conexión a la base de datos
  private function getConnection()
  {
    // Establecer conexión
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

    // Verificar conexión
    if ($this->conn->connect_error) {
      die("Error de conexión: " . $this->conn->connect_error);
    }
  }

  // Método para obtener las extensiones permitidas desde la base de datos
  public function getExtensions()
  {
    $query = "SELECT nombre FROM info WHERE id = 1"; // Ajusta la consulta según tu estructura de base de datos
    $result = $this->conn->query($query);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row['nombre'];
    } else {
      return false;
    }
  }
}
