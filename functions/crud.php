<?php
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "app_museum";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $database);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}


function closeDB($conn) {
    // Menutup koneksi
    $conn->close();
}

function selectData($table, $columns = "*", $condition = "") {
    $conn = connectDB();

    if (is_array($columns)) {
        $columns = implode(", ", $columns);
    }

    $sql = "SELECT $columns FROM $table";
    if (!empty($condition)) {
        $sql .= " WHERE $condition";
    }

    $result = $conn->query($sql);

    closeDB($conn);

    return $result;
}


function insertData($table, $data) {
    $conn = connectDB();

    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    $result = $conn->query($sql);

    closeDB($conn);

    return $result;
}

function updateData($table, $data, $condition) {
    $conn = connectDB();

    $updates = [];
    foreach ($data as $key => $value) {
        $updates[] = "$key = '$value'";
    }

    $updatesStr = implode(", ", $updates);

    $sql = "UPDATE $table SET $updatesStr WHERE $condition";

    $result = $conn->query($sql);

    closeDB($conn);

    return $result;
}

function deleteData($table, $condition) {
    $conn = connectDB();

    $sql = "DELETE FROM $table WHERE $condition";

    $result = $conn->query($sql);

    closeDB($conn);

    return $result;
}   

function resultQuery($sql) {
    $conn = connectDB();

    $result = $conn->query($sql);

    closeDB($conn);

    return $result;
}  
?>
