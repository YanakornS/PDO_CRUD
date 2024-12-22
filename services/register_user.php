<?php
include("connection/connect.php");



function registerUser($username, $password, $gmail)
{
    global $conn;  // เชื่อมต่อฐานข้อมูลจากไฟล์ connect.php

    // SQL query สำหรับการเพิ่มข้อมูลในตาราง user
    $sql = "INSERT INTO `user`(`username`, `password`, `gmail`) VALUES (:username, :password, :gmail)";
    $stmt = $conn->prepare($sql);

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);  // เข้ารหัสรหัสผ่าน

    // Binding parameter
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashPassword, PDO::PARAM_STR);
    $stmt->bindParam(':gmail', $gmail, PDO::PARAM_STR);

    // ตรวจสอบการ execute
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>
