// ในไฟล์ script.js

// ฟังก์ชันสำหรับส่งข้อมูลไปยังเซิร์ฟเวอร์ด้วย AJAX (เหมือนเดิม)
function sendDataToServer(url, data) {
    // ... (same as before)
}

// ตัวอย่างการจัดการฟอร์มลงทะเบียน (signupForm)
const signupForm = document.getElementById("signupForm");
if (signupForm) {
    signupForm.addEventListener("submit", async (event) => {
        event.preventDefault();

        const formData = new FormData(signupForm);
        const data = new URLSearchParams(formData).toString();

        try {
            const response = await sendDataToServer("signup.php", data); 
            if (response === "success") {
                alert("ลงทะเบียนสำเร็จ!"); // แสดงข้อความสำเร็จ
                window.location.href = "login.html"; // เปลี่ยนเส้นทางไปยังหน้า login หลังลงทะเบียนสำเร็จ
            } else {
                alert("ลงทะเบียนไม่สำเร็จ: " + response);
            }
        } catch (error) {
            alert("เกิดข้อผิดพลาด: " + error);
        }
    });
}