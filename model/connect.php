<?php 
function dbConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "website_essence";
  

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
function pdo_excute($sql){
    $sql_args = array_slice(func_get_args(), 1);
   try{
        $conn = dbConnection();
        $stmt = $conn->prepare($sql);
        $stmt -> execute($sql_args);
   } catch (PDOException $e) {
    throw $e;
   } finally{
    unset($conn);
   }
}
function pdo_excute_lastId($sql){
    $sql_args = array_slice(func_get_args(), 1);
   try{
        $conn = dbConnection();
        $stmt = $conn->prepare($sql);
        $stmt -> execute($sql_args);
        return $conn->lastInsertId();
    } 
     catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Thêm dòng này để xem chi tiết lỗi SQL
    throw $e;
   } finally{
    unset($conn);
   }
}
function pdo_query_all($sql) {
    $sql_args = array_slice(func_get_args(), 1);
   try{
    $conn = dbConnection();
    if($conn){
        $stmt = $conn->prepare($sql);
        $stmt -> execute($sql_args);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all rows
    return  $row;
    } else{
        return [];
    }
   } catch (PDOException $e) {
    throw $e;
   } finally{
    unset($conn);
   }
}


function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
   try{
    $conn = dbConnection();
    if($conn){
        $stmt = $conn->prepare($sql);
        $stmt -> execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // fetch rows
    return  $row;
    } else{
        return [];
    }
   } catch (PDOException $e) {
    throw $e;
   } finally{
    unset($conn);
   }
}


// function themDuLieu($conn, $tenBang, $duLieu) {
//     $columns = implode(', ', array_keys($duLieu));
//     $values = ':' . implode(', :', array_keys($duLieu));
//     $sql = "INSERT INTO $tenBang ($columns) VALUES ($values)";
//     $stmt = $conn->prepare($sql);
//     foreach ($duLieu as $key => $value) {
//         $stmt->bindValue(":$key", $value);
//     }
//     return $stmt->execute();
// }

// function suaDuLieu($conn, $tenBang, $duLieu, $dieuKien) {
//     $set = '';
//     foreach ($duLieu as $key => $value) {
//         $set .= "$key = :$key, ";
//     }
//     $set = rtrim($set, ', ');
//     $sql = "UPDATE $tenBang SET $set WHERE $dieuKien";
//     $stmt = $conn->prepare($sql);
//     foreach ($duLieu as $key => $value) {
//         $stmt->bindValue(":$key", $value);
//     }
//     return $stmt->execute();
// }

// function xoaDuLieu($conn, $tenBang, $dieuKien) {
//     $sql = "DELETE FROM $tenBang WHERE $dieuKien";
//     $stmt = $conn->prepare($sql);
//     return $stmt->execute();
// }