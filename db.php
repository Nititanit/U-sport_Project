<?php
$servername = "localhost";
$username = "root";
$password = ""; // ปกติ XAMPP จะไม่มีรหัสผ่าน ถ้ามีให้ใส่ตรงนี้
$dbname = "usport_db"; // ชื่อฐานข้อมูลที่เราสร้าง

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>