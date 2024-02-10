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
            if($param == "password") {
                $pass = $_POST[$param];
                $newpass = password_hash($pass, PASSWORD_BCRYPT);
                $query->bindParam($value, $newpass);
            } else {
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

    function getId($table, $field, $param, $post, $passwordfield) {
        $gottenId = "";
        $sql = "SELECT * FROM $table WHERE $field = $param";
        $query = $this->connection->prepare($sql);
        $query->bindParam($param, $_POST[$post]);
        $query->execute();

        $results = $query->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0 && password_verify($_POST[$post], $results[$passwordfield])) {
            $gottenId = $results['id'];
        }

        return $gottenId;
    }
}
?>