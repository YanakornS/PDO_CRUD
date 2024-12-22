<?php
session_start();  // เริ่ม session เพื่อตรวจสอบสถานะผู้ใช้

// สมมติว่า session มีข้อมูลผู้ใช้งานแล้ว
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            padding: 0.5rem 1rem;
        }
        .navbar-nav .nav-link {
            font-size: 16px;
        }
        .profile-img {
            width: 30px;
            height: 30px;
            object-fit: cover;
        }
        .navbar-toggler-icon {
            background-color: #fff;
        }
        .nav-item a {
            padding: 10px 15px;
        }
        .navbar-brand {
            font-size: 1.5rem;
        }
        .d-flex.ms-auto {
            align-items: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: rgb(5, 100, 168);">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-white" href="#">ระบบจัดการ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="index.php">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="form_add_user.php">เพิ่มผู้ใช้งาน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">เกี่ยวกับ</a>
                    </li>
                </ul>

                <!-- ปุ่ม Login/Register หรือแสดงชื่อผู้ใช้และปุ่ม Logout -->
                <div class="d-flex ms-auto">
                    <?php if ($user): ?>
                        <!-- แสดงชื่อผู้ใช้และรูปโปรไฟล์ -->
                        <a class="nav-link text-white d-flex align-items-center" href="profile.php">
                            <img src="https://cdn-icons-png.flaticon.com/512/9187/9187532.png" 
                            alt="Profile" class="rounded-circle profile-img me-2">
                            <?= $user['username'] ?>
                        </a>
                        <form method="POST">
                            <button type="submit" name="logout" class="btn btn-light ms-2">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    <?php else: ?>
                        <!-- ปุ่ม Register/Login หากยังไม่ได้ล็อกอิน -->
                        <a href="register.php" class="btn btn-light me-2">Register</a>
                        <a href="login.php" class="btn btn-light">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script src="assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
