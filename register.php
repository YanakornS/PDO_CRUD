<?php
include("connection/connect.php");  // เชื่อมต่อกับฐานข้อมูล
include("services/register_user.php");  // รวมฟังก์ชัน registerUser()
include("layout.php");

// ตรวจสอบวิธีการส่งข้อมูลผ่านฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gmail = $_POST['gmail'];

    // เรียกใช้ฟังก์ชัน registerUser()
    if (registerUser($username, $password, $gmail)) {
        echo "เพิ่มข้อมูลสำเร็จแล้ว";
        header("refresh: 2; url=login.php");  // รีเฟรชหลังจาก 2 วินาทีไปยังหน้า login
        exit;
    } else {
        echo "เพิ่มข้อมูลไม่สำเร็จ";
        header("refresh: 2; url=register.php");  // รีเฟรชหน้า register หากเกิดข้อผิดพลาด
        exit;
    }
}
?>

<style>
        body {
            background-color: #f4f8fb;  /* Background ของหน้า register */
        }
        .register-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 50px auto;
        }
        .btn-custom {
            background-color: rgb(5, 100, 168);
            color: white;
        }
        .btn-custom:hover {
            background-color: rgb(4, 80, 138);
        }
    </style>
<body>

    <div class="register-container">
        <h2 class="text-center text-primary">Register</h2>

        <!-- แบบฟอร์มลงทะเบียน -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <label for="gmail" class="form-label">Gmail</label>
                <input type="email" name="gmail" id="gmail" class="form-control" placeholder="Gmail" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Register</button>
        </form>

        <div class="text-center mt-3">
            <p>มีบัญชีแล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
        </div>
    </div>

    
</body>

