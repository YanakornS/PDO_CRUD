<?php
session_start();  // เริ่ม session

// ตรวจสอบสถานะการล็อกอิน
if (!isset($_SESSION['user'])) {
    // หากยังไม่ได้ล็อกอิน ให้แสดงข้อความและรีไดเร็กต์ไปที่หน้า login
    echo "คุณต้องเข้าสู่ระบบก่อนจึงจะสามารถเพิ่มข้อมูลได้";
    header("refresh: 2; url=http://localhost/PDO_CRUD/login.php"); // เปลี่ยนเป็นหน้า login ของคุณ
    exit;  // หยุดการทำงานต่อ
}

include("../connection/connect.php");

$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$role = $_POST['role'];

$sql = "INSERT INTO `users`(`email`, `password`, `fname`, `lname`, `role`) VALUES (:email, :password, :fname, :lname, :role)";

$stmt = $conn->prepare($sql);

$hashPassword = password_hash($password, PASSWORD_DEFAULT); //เข้ารหัส

$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':password', $hashPassword, PDO::PARAM_STR);
$stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
$stmt->bindParam(':role', $role, PDO::PARAM_STR);

if ($stmt->execute()) {
    // เพิ่มข้อมูลสำเร็จ
    $message = "เพิ่มข้อมูลสำเร็จแล้ว";
    $alertType = "success";  // SweetAlert2 type สำหรับสำเร็จ
} else {
    // เพิ่มข้อมูลไม่สำเร็จ
    $message = "เพิ่มข้อมูลไม่สำเร็จ";
    $alertType = "error";    // SweetAlert2 type สำหรับผิดพลาด
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลผู้ใช้</title>
    <!-- โหลด SweetAlert2 CSS -->
    <link rel="stylesheet" href="../assets/sweetalert2/sweetalert2.min.css">
</head>
<body>

<!-- JavaScript ของ SweetAlert2 -->
<script src="../assets/sweetalert2/sweetalert2.min.js"></script>

<script>
    // แสดง SweetAlert2 ตามผลลัพธ์
    Swal.fire({
        title: '<?php echo $message; ?>',
        icon: '<?php echo $alertType; ?>',
        confirmButtonText: 'ตกลง'
    }).then(function() {
        // หลังจากคลิกตกลง ให้กลับไปที่หน้าแรก
        window.location.href = 'http://localhost/PDO_CRUD/';  // รีไดเร็กต์ไปที่หน้าแรก
    });
</script>

</body>
</html>
