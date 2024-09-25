CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, email, password)
VALUES ('ชื่อผู้ใช้จากฟอร์ม', 'อีเมลจากฟอร์ม', 'รหัสผ่านที่เข้ารหัสแล้ว');