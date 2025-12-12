<?php 
session_start();
require('db.php'); // เรียกใช้ไฟล์เชื่อมต่อฐานข้อมูล

$errors = array();

if (isset($_POST['reg_user'])) {
    // รับค่าจากฟอร์ม
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // เช็คว่ากรอกครบไหม
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

    // เช็คว่ามี email นี้ในระบบหรือยัง
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // ถ้ามี user อยู่แล้ว
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // ถ้าไม่มี error ให้บันทึก
    if (count($errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT); // เข้ารหัส Password

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: Login.php'); // สมัครเสร็จเด้งไปหน้าแรก
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - U-Sport</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- ตั้งค่าพื้นฐาน --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 400px; /* ความกว้างของ Card */
            padding: 20px;
            text-align: center;
        }

        /* --- หัวข้อ --- */
        h1 {
            color: #ff0000; /* สีแดงตามรูป */
            font-weight: bold;
            margin-bottom: 30px;
            font-size: 32px;
        }

        /* --- กล่อง Input --- */
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 40px 12px 40px; /* เว้นที่ซ้ายขวาให้ไอคอน */
            border: 1px solid #00c853; /* เส้นขอบสีเขียว */
            border-radius: 10px; /* มุมมน */
            outline: none;
            font-size: 16px;
            color: #555;
            box-sizing: border-box; /* ให้ padding ไม่ดันความกว้าง */
        }

        .input-group input::placeholder {
            color: #999;
        }

        /* ไอคอนฝั่งซ้าย (User, Email, etc.) */
        .input-group .icon-left {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #00c853; /* สีเขียว */
            font-size: 18px;
        }

        /* ไอคอนฝั่งขวา (Eye toggle) */
        .input-group .icon-right {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #00c853;
            font-size: 18px;
            cursor: pointer;
        }

        /* --- ปุ่ม Sign Up --- */
        .btn-signup {
            width: 100%;
            background-color: #ff0000; /* สีแดง */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(255, 0, 0, 0.2);
        }

        .btn-signup:hover {
            background-color: #d30000;
        }

        /* --- Footer Links --- */
        .footer-text {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }

        .footer-text a {
            color: #00c853; /* สีเขียว */
            text-decoration: none;
        }

        .other-login-text {
            margin-top: 15px;
            font-size: 14px;
            font-weight: bold;
            color: #000;
        }

        /* --- Social Icons --- */
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .fb-btn {
            background-color: #1877f2; /* สี Facebook */
            color: white;
        }

        .google-btn {
            background-color: #fff;
            color: #db4437; /* สี Google */
            border: 1px solid #ddd;
        }
        
        /* แก้ไข Link ให้ Google มีสีสันตาม Logo */
        .google-icon {
            background: conic-gradient(from -45deg, #ea4335 110deg, #4285f4 90deg 180deg, #34a853 180deg 270deg, #fbbc05 270deg) 73% 55%/150% 150% no-repeat;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            -webkit-text-fill-color: transparent;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Sign - Up</h1>

        <form action="signup.php" method="post">
            
            <div class="input-group">
                <i class="far fa-user icon-left"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <i class="far fa-envelope icon-left"></i>
                <input type="email" name="email" placeholder="Email Id" required>
            </div>

            <div class="input-group">
                <i class="fas fa-key icon-left"></i>
                <input type="password" name="password_1" id="pass1" placeholder="New Password" required>
                <i class="far fa-eye-slash icon-right" onclick="togglePassword('pass1', this)"></i>
            </div>

            <div class="input-group">
                <i class="fas fa-key icon-left"></i>
                <input type="password" name="password_2" id="pass2" placeholder="Confirm Password" required>
                <i class="far fa-eye-slash icon-right" onclick="togglePassword('pass2', this)"></i>
            </div>

            <a href="Login.php"><button type="submit" name="reg_user" class="btn-signup">Sign-Up</button></a

        </form>

        <div class="footer-text">
            Didn't Have Account? <a href="login.php">Log In</a> 
        </div>

        <div class="other-login-text">
            Others Ways to sign-in
        </div>

        <div class="social-icons">
            <a href="#" class="social-btn fb-btn">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-btn google-btn">
                <i class="fab fa-google google-icon"></i>
            </a>
        </div>
    </div>

    <script>
        // ฟังก์ชันสำหรับเปิด/ปิด รหัสผ่าน (รูปตา)
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>

</body>
</html>