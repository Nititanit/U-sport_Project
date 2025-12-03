<<<<<<< HEAD
<!DOCTYPE html>
<html lang="th">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">    
<style>
            /* การตั้งค่าพื้นฐาน */
    body {
        font-family: 'Kanit', sans-serif; /* ใช้ฟอนต์ที่ดูทันสมัย */
        background-color: #f0f0f0; /* สีพื้นหลังอ่อนๆ ให้เว็บไซต์ดูโดดเด่น */
        display: flex;
        justify-content: center; /* จัดให้อยู่ตรงกลางแนวนอน */
        align-items: center; /* จัดให้อยู่ตรงกลางแนวตั้ง */
        min-height: 100vh; /* ความสูงเต็มจอ */
        margin: 0;
    }

    /* Container หลักที่จำลองขนาดของหน้าจอมือถือ */
    .splash-container {
        width: 100%;
        max-width: 400px; /* จำกัดความกว้างเหมือนหน้าจอมือถือ */
        background-color: #ffffff; /* พื้นหลังสีขาวตามภาพ */
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* เพิ่มเงาเล็กน้อย */
        text-align: center;
        min-height: 600px;
        display: flex;
        flex-direction: column; /* จัดองค์ประกอบให้อยู่ในแนวตั้ง */
        justify-content: space-between; /* กระจายองค์ประกอบหลักให้ห่างกัน */
    }

    /* ส่วนหัว (Header) */
    .header {
        padding-top: 30px;
    }

    .header h1 {
        color: #ff0000; /* สีแดงสด */
        font-size: 2.2em;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .header p {
        color: #000000;
        font-size: 1.1em;
        font-weight: 400;
        margin-top: 5px;
    }

    /* ส่วนโลโก้/ภาพหลัก */
    .logo-section {
        flex-grow: 1; /* ให้ส่วนนี้ขยายเพื่อดันปุ่มลงด้านล่าง */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-box {
        width: 90%;
        max-width: 300px;
        height: 180px;
        background-color: #ff0000; /* พื้นหลังสีแดงของโลโก้ */
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .logo-box img {
        width: 350px;
        max-width: 400px;
        max-height: 400px;
        border-radius: 10px;
        margin-left: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* ส่วนปุ่มหลัก */
    .action-section {
        padding-bottom: 30px;
    }

    .get-started-btn {
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
    }

    .get-started-btn:hover {
        background-color: #cc0000; /* สีแดงเข้มขึ้นเมื่อชี้ */
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U SPORT ARENA</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="splash-container">
        <header class="header">
            <h1>U SPORT ARENA</h1>
            <p>Have Fun with Friends!</p>
        </header>

        <div class="logo-section">
            <div class="container">
                <div class="logo-box">
                    <img src="assets/images/U-Sport_pic.png" alt="">
                </div>
            </div>
        </div>

        <div class="action-section">
            <a href="Login.php"><button class="get-started-btn">Get Started</button></a
        </div>
    </div>
</body>
=======
<!DOCTYPE html>
<html lang="th">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">    
<style>
            /* การตั้งค่าพื้นฐาน */
    body {
        font-family: 'Kanit', sans-serif; /* ใช้ฟอนต์ที่ดูทันสมัย */
        background-color: #f0f0f0; /* สีพื้นหลังอ่อนๆ ให้เว็บไซต์ดูโดดเด่น */
        display: flex;
        justify-content: center; /* จัดให้อยู่ตรงกลางแนวนอน */
        align-items: center; /* จัดให้อยู่ตรงกลางแนวตั้ง */
        min-height: 100vh; /* ความสูงเต็มจอ */
        margin: 0;
    }

    /* Container หลักที่จำลองขนาดของหน้าจอมือถือ */
    .splash-container {
        width: 100%;
        max-width: 400px; /* จำกัดความกว้างเหมือนหน้าจอมือถือ */
        background-color: #ffffff; /* พื้นหลังสีขาวตามภาพ */
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* เพิ่มเงาเล็กน้อย */
        text-align: center;
        min-height: 600px;
        display: flex;
        flex-direction: column; /* จัดองค์ประกอบให้อยู่ในแนวตั้ง */
        justify-content: space-between; /* กระจายองค์ประกอบหลักให้ห่างกัน */
    }

    /* ส่วนหัว (Header) */
    .header {
        padding-top: 30px;
    }

    .header h1 {
        color: #ff0000; /* สีแดงสด */
        font-size: 2.2em;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .header p {
        color: #000000;
        font-size: 1.1em;
        font-weight: 400;
        margin-top: 5px;
    }

    /* ส่วนโลโก้/ภาพหลัก */
    .logo-section {
        flex-grow: 1; /* ให้ส่วนนี้ขยายเพื่อดันปุ่มลงด้านล่าง */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-box {
        width: 90%;
        max-width: 300px;
        height: 180px;
        background-color: #ff0000; /* พื้นหลังสีแดงของโลโก้ */
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .logo-box img {
        width: 350px;
        max-width: 400px;
        max-height: 400px;
        border-radius: 10px;
        margin-left: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* ส่วนปุ่มหลัก */
    .action-section {
        padding-bottom: 30px;
    }

    .get-started-btn {
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
    }

    .get-started-btn:hover {
        background-color: #cc0000; /* สีแดงเข้มขึ้นเมื่อชี้ */
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U SPORT ARENA</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="splash-container">
        <header class="header">
            <h1>U SPORT ARENA</h1>
            <p>Have Fun with Friends!</p>
        </header>

        <div class="logo-section">
            <div class="container">
                <div class="logo-box">
                    <img src="assets/images/U-Sport_pic.png" alt="">
                </div>
            </div>
        </div>

        <div class="action-section">
            <a href="Login.php"><button class="get-started-btn">Get Started</button></a
        </div>
    </div>
</body>
>>>>>>> c3c1d7542e8cc70ee954818ae859005a051c048f
</html>