<?php
session_start();
require('db.php');

$errors = array();

if (isset($_POST['login_user'])) {
    // แก้ไข 1: รับค่า username แทน email
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // แก้ไข 2: เช็ค username ว่างหรือไม่
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }

    if (count($errors) == 0) {
        // แก้ไข 3: ค้นหาใน Database โดยเช็คที่ column 'username'
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            // ตรวจสอบรหัสผ่าน (Hash Check)
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email']; // เก็บ email เผื่อไว้ใช้
                $_SESSION['success'] = "You are now logged in";
                header("location: index.php"); 
                exit();
            } else {
                array_push($errors, "Wrong password");
            }
        } else {
            // แจ้งเตือนว่าหา username ไม่เจอ
            array_push($errors, "Username not found");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* CSS เดิม (เหมือนอันที่แล้ว) */
        body { 
            font-family: 'Kanit', sans-serif; 
            background-color: #f0f0f0; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
        }

        .login-container { 
            width: 100%; 
            max-width: 400px; 
            background-color: #ffffff; 
            padding: 40px 25px; 
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); 
            text-align: center; 
            border-radius: 10px; 
        }

        .header h1 { 
            color: #ff0000; 
            font-size: 2.5em; 
            font-weight: 700; 
            margin-bottom: 0px; 
        }

        .header p { 
            color: #000000; 
            font-size: 1.1em; 
            font-weight: 600; 
            margin-top: 5px; 
            margin-bottom: 30px; 
        }

        .error-msg { 
            color: red; 
            background: #ffe6e6; 
            padding: 10px; 
            border-radius: 5px; 
            margin-bottom: 15px; 
            text-align: left; 
            font-size: 0.9em; 
        }

        .input-group { 
            display: flex; 
            align-items: center; 
            border: 1px solid #00c853; 
            border-radius: 8px; 
            padding: 10px 15px; 
            margin-bottom: 20px; 
        }

        .input-group i { 
            color: #00c853; 
            font-size: 1.1em; 
            margin-right: 15px; 
        }

        .input-group input { 
            flex-grow: 1; 
            border: none; 
            outline: none; 
            font-size: 1em; 
            padding: 5px 0; 
        }

        .password-group { 
            position: relative; 
        }

        .toggle-password { 
            position: absolute; 
            right: 15px; 
            cursor: pointer; 
            color: #888 !important; 
            margin-right: 0 !important; 
        }

        .forgot-password { 
            text-align: left; 
            margin-top: -10px; 
            margin-bottom: 25px; 
        }

        .forgot-password a { 
            color: #00c853; 
            text-decoration: none; 
            font-weight: 600; 
        }

        .login-btn { 
            width: 100%; 
            padding: 15px; 
            background-color: #ff0000; 
            color: #ffffff; 
            border: none; 
            border-radius: 8px; 
            font-size: 1.2em; 
            font-weight: 700; 
            cursor: pointer; 
            transition: background-color 0.3s ease; 
            margin-bottom: 20px; 
        }

        .login-btn:hover { 
            background-color: #cc0000; 
        }

        .signup-link { 
            font-size: 1em; 
            color: #333; 
        }

        .signup-link a { 
            color: #00c853; 
            text-decoration: none; 
            font-weight: 600; 
        }

        .social-login-section { 
            margin-top: 30px; 
        }

        .social-login-section p { 
            color: #333; 
            margin-bottom: 15px; 
        }

        .social-icons { 
            display: flex; 
            justify-content: center; 
            gap: 20px; 
        }

        .social-icon { 
            width: 45px; 
            height: 45px; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.5em; 
            color: #ffffff; 
            text-decoration: none; 
        }

        .facebook { 
            background-color: #4267B2; 
        }

        .google { 
            background-color: #DB4437; 
        }
    </style>
</head>
<body>
    <div class="login-container">
        <header class="header">
            <h1>Login</h1>
            <p>Have Fun with Friends!</p>
        </header>

        <form class="login-form" method="post" action="login.php">
            
            <?php if (count($errors) > 0) : ?>
                <div class="error-msg">
                    <?php foreach ($errors as $error) : ?>
                        <p style="margin:0;">⚠️ <?php echo $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group password-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <i class="fa-solid fa-eye-slash toggle-password" onclick="togglePassword()"></i> 
            </div>
            
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
            
            <button type="submit" name="login_user" class="login-btn">Login</button>
        </form>

        <p class="signup-link">
            Didn't Have Account? <a href="signup.php">Sign Up</a>
        </p>
        
        <div class="social-login-section">
            <p>Others Ways to sign-in</p>
            <div class="social-icons">
                <a href="#" class="social-icon facebook">
                   <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="social-icon google">
                    <i class="bi bi-google"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>
</html>