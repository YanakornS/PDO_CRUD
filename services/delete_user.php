<?php 

include("../connection/connect.php");

$iduser = $_GET['iduser'];

$sql = "DELETE FROM `users` WHERE id = $iduser";

$stmt = $conn->prepare($sql);

if($stmt->execute()) {
    $message = "ลบข้อมูลสำเร็จแล้ว";
    $alertType = "success";  // SweetAlert2 type สำหรับสำเร็จ
} else {
    $message = "ลบข้อมูลไม่สำเร็จ";
    $alertType = "error";    // SweetAlert2 type สำหรับผิดพลาด
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลบข้อมูลผู้ใช้</title>
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
        window.location.href = 'http://localhost/PDO_CRUD/';
    });
</script>

</body>
</html>
