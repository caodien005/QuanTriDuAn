<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../db.php';
?>
<!DOCTYPE html>
<html>
<head><title>Danh sách phản hồi</title><link rel="stylesheet" href="style.css"></head>
<body>
<header>
    <h1>Danh sách phản hồi khách hàng</h1>
    <a href="logout.php">[Đăng xuất]</a>
    <style>
    header a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
    position: absolute; /* Đặt vị trí tuyệt đối */
    top: 50%; /* Căn giữa theo chiều dọc */
    right: 20px; /* Căn góc phải */
    transform: translateY(-50%); /* Đảm bảo căn giữa chính xác */
    background-color: #ff69b4;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

    header a:hover {
    background-color: #ff85c1;
}

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0 10px; /* Tăng khoảng cách giữa các hàng */
        margin-top: 20px; /* Thêm khoảng cách trên bảng */
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    a {
        color: #ff69b4;
        text-decoration: none;
    }

    a:hover {
        color: #ff85c1;
} 
    </style>
</header>
<div class="container-replyadmin">
<table>
    <tr>
        <th>ID</th><th>Họ tên</th><th>Loại</th><th>Nội dung</th><th>Ngày gửi</th><th>Phản hồi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['category']}</td>
                <td>{$row['message']}</td>
                <td>{$row['created_at']}</td>
                <td><a href='reply_feedback.php?id={$row['id']}'>Phản hồi</a></td>
              </tr>";
    }
    ?>
</table>
</div>
<footer>&copy; 2025 Nhaflower</footer>
</body>
</html>
