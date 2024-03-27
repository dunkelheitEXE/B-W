<?php
class Database {
    //Attributes
    private $user = "user";
    private $host = "host";
    private $dbpassword = "password";
    private $dbname = "database";
    public $connection;

    function __construct() 
    {
        $dns = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";";
        $this->connection = new PDO($dns, $this->user, $this->dbpassword);
    }

    function insert($table, $fields, $values, $params) {
        $mes = "";
        $sql = "INSERT INTO $table($fields) VALUES($values)";
        $query = $this->connection->prepare($sql);
        $value_list = explode(', ', $values);
        $param_list = explode(', ', $params);
        $dictionary = array_combine($value_list, $param_list);
        foreach ($dictionary as $value => $param) {
            if($param == "password") { // Si es contraseña
                $pass = $_POST[$param];
                $newpass = password_hash($pass, PASSWORD_BCRYPT);
                $query->bindParam($value, $newpass);
            } else if($param == "userphoto") { // Si es imagen
                $img_route = 'img/' . $_FILES[$param]['name'];
                move_uploaded_file($_FILES['userphoto']['tmp_name'], $img_route);
                $query->bindParam($value, $img_route);
            }
            else {
                $query->bindParam($value, $_POST[$param]);
            }
        }

        if($query->execute()) {
            $mes = "Signed up successfully";
        } else {
            $mes = "Something was wrong";
        }

        return $mes;
    }

    function getId($table, $param, $password) {
        $id = "";// prepare id return

        $sql = "SELECT * FROM $table WHERE useremail = :parameter"; // Prepare query
        $query = $this->connection->prepare($sql);
        $query->bindParam(':parameter', $param);
        $query->execute();

        $results = $query->fetch(PDO::FETCH_ASSOC); // Save results

        if(count($results) > 0 && password_verify($password, $results['userpassword'])) {
            $id = $results['id'];
            return $id;
        } else { // In case that nothing is return
            return "";
        }
    }

    function getData($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query -> bindParam(':id', $id);
        $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0) {
            return $results;
        }
    }

    
}
?>