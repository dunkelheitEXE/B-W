<?php
class MysqlFunc {
    function Insert($table, $fields, $values, $connection) {
        $query = "INSERTO INTO $table($fields) VALUES($values)";
        $stmt = $connection->prepare($query);
        return $stmt;
    }
}
?>