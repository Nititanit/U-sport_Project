<!DOCTYPE html>
<html lang="th">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">    
<style>
body {
    font-family: 'Kanit', sans-serif;
    background-color: #f0f0f0; 
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

/* Container หลัก (จำลองหน้าจอมือถือ) */
.login-container {
    width: 100%;
    max-width: 400px; /* จำกัดความกว้างเหมือนหน้าจอมือถือ */
    background-color: #ffffff;
    padding: 40px 25px; /* เพิ่ม padding ให้มีพื้นที่รอบขอบ */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    border-radius: 10px;
}

/* ส่วนหัวข้อ */
.header h1 {
    color: #ff0000; /* Login สีแดงสด */
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

/* กลุ่ม Input (ช่อง Username/Password) */
.input-group {
    display: flex;
    align-items: center;
    border: 1px solid #00c853; /* สีเขียวรอบกรอบตามภาพ */
    border-radius: 8px;
    padding: 10px 15px;
    margin-bottom: 20px;
}

.input-group i {
    color: #00c853; /* สีไอคอนเป็นสีเขียว */
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

/* กลุ่ม Password พิเศษเพื่อจัดวางไอคอนตา */
.password-group {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 15px;
    cursor: pointer;
    color: #888; /* ทำให้ไอคอนตาสีเทาอ่อน */
    margin-right: 0 !important;
}

/* ลิงก์ Forgot Password */
.forgot-password {
    text-align: left;
    margin-top: -10px;
    margin-bottom: 25px;
}

.forgot-password a {
    color: #00c853; /* สีเขียวตามภาพ */
    text-decoration: none;
    font-weight: 600;
}

/* ปุ่ม Login */
.login-btn {
    width: 100%;
    padding: 15px;
    background-color: #ff0000; /* สีแดงสด */
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

/* ลิงก์ Sign Up */
.signup-link {
    font-size: 1em;
    color: #333;
}

.signup-link a {
    color: #00c853; /* สีเขียว Sign Up */
    text-decoration: none;
    font-weight: 600;
}

/* ส่วนลงชื่อเข้าใช้ด้วยวิธีอื่น */
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
    gap: 20px; /* ระยะห่างระหว่างไอคอน */
}

.social-icon {
    width: 45px;
    height: 45px;
    border-radius: 50%; /* ทำให้เป็นวงกลม */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5em;
    color: #ffffff;
    text-decoration: none;
}

.facebook {
    background-color: #4267B2; /* สี Facebook */
}

.google {
    background-color: #DB4437; /* สี Google (หรือสีตามต้องการ) */
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <header class="header">
            <h1>Login</h1>
            <p>Have Fun with Friends!</p>
        </header>

    <form class="login-form">
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" id="username" required>
            </div>

            <div class="input-group password-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" placeholder="Password" id="password" required>
                <i class="fa-solid fa-eye-slash toggle-password"></i> 
            </div>
            
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
            
            <button type="submit" class="login-btn">Login</button>
        </form>

        <p class="signup-link">
            Didn't Have Account? <a href="#">Sign Up</a>
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
</body>
</html>