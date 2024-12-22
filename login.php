<?php
include("layout.php");
include("services/login_user.php");  // รวมฟังก์ชัน registerUser()

// ตรวจสอบสถานะ session ว่ามีการเริ่มต้นไว้แล้วหรือไม่
if (session_status() == PHP_SESSION_NONE) {
    session_start();  // เริ่มต้น session เฉพาะเมื่อยังไม่มี session ที่ใช้งาน
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = loginUser($email, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        echo "ล็อกอินสำเร็จแล้ว";
        header("refresh: 2; url=index.php");
    } else {
        echo "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
        header("refresh: 2; url=login.php");
    }
}
?>
<style>
    body {
        background-color: #f4f8fb;  /* Background ของหน้า login */
    }
    .login-container {
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
    <div class="login-container">
        <h2 class="text-center text-primary">Login</h2>

        <!-- แบบฟอร์มล็อกอิน -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <p>ยังไม่มีบัญชี? <a href="register.php">สมัครสมาชิก</a></p>
        </div>
    </div>
</body>
