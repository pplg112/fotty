<?php
// ในไฟล์ signup.php

// ตรวจสอบว่ามีการส่งข้อมูลมาทาง POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // รับข้อมูลจากฟอร์ม
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ตรวจสอบความถูกต้องของข้อมูล
    // ... (เพิ่มโค้ดตรวจสอบความถูกต้องที่นี่)

    // เข้ารหัสรหัสผ่านก่อนบันทึก
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // เชื่อมต่อฐานข้อมูล PostgreSQL 
    $conn = pg_connect("host=172.16.0.2 dbname=singup_fotty user=usename password=password");

    // ตรวจสอบการเชื่อมต่อ
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    // ใช้ prepared statements เพื่อป้องกัน SQL injection
    $stmt = pg_prepare($conn, "insert_user", "INSERT INTO users (username, email, password) VALUES ($1, $2, $3)");
    $result = pg_execute($conn, "insert_user", array($username, $email, $hashedPassword));

    // ตรวจสอบผลลัพธ์
    if ($result) {
        echo "success";
    } else {
        echo "Error: " . pg_last_error($conn);
    }

    // ปิดการเชื่อมต่อ
    pg_close($conn);

} else {
    // ถ้าไม่ได้ส่งข้อมูลมาทาง POST ให้แสดงข้อผิดพลาด
    echo "Invalid request";
}
?>