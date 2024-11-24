<?php

function insert_user($user, $pwd, $email)
{
    $sql = "INSERT INTO user (username,password,email) VALUES ('$user','$pwd','$email')";
    return pdo_excute_lastId($sql);
}
function insert_user_id($fullname,$username,$password,$address,$email,$phone)
{
    $sql = "INSERT INTO user (fullname,username,password,address,email,phone) VALUES ('$fullname','$username','$password','$address','$email','$phone')";
    return pdo_excute_lastId($sql);
}
function check_user($user, $pwd)
{
    $conn = dbConnection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = '" . $user . "' AND password = '" . $pwd . "'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if (count($kq) == 0) {
        // Tài khoản không tồn tại
        return -1;
    }else{
        // Tài khoản tồn tại, kiểm tra mật khẩu
        if ($kq[0]['password'] == $pwd) {
            // Tài khoản hợp lệ
            return $kq[0]['role'];
        } else {
            // Tài khoản tồn tại nhưng mật khẩu sai
            return -2;
        }
    }
    }
    // if (count($kq) > 0)
    //     return $kq[0]['role'];
    // else
    //     return 0;

function get_user_info($user, $pwd)
{
    $conn = dbConnection();
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = '" . $user . "' AND password = '" . $pwd . "'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;


}
