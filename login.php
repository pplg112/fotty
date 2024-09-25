<?php
// ในไฟล์ login.php

// รับข้อมูลจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// ตรวจสอบชื่อผู้ใช้และรหัสผ่านในฐานข้อมูล
// ...

// ถ้าถูกต้อง
session_start();
$_SESSION['username'] = $username; // สร้าง session
echo "success";

// ถ้าไม่ถูกต้อง
// echo "ข้อความแจ้งเตือน"; 
?>