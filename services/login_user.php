<?php
include($_SERVER['DOCUMENT_ROOT'] . "/PDO_CRUD/connection/connect.php");



function loginUser($email, $password)
{
    global $conn;

    $sql = "SELECT * FROM `user` WHERE `gmail` = :gmail";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':gmail', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user; // ส่งข้อมูลผู้ใช้งานกลับ
    } else {
        return false; // ล็อกอินไม่สำเร็จ
    }
}
?>
