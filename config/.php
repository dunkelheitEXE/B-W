<?php

function Insert($table, $fields, $values, $connection, $params) {
    $query = "INSERT INTO $table($fields) VALUES($values)";
    $stmt = $connection->prepare();
    foreach($params as $key => $value) {
        $stmt->BindParam($key, $_POST[$value]);
    }
    return $query;
}

function InsertTo($table, $fields, $values, $connection, $id) {
    $query = "INSERT INTO $table($fields) VALUES($values) WHERE id=$id";
    return $query;
}

function BindParams($connection, $params) {
    
}

?>