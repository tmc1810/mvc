<?php
    include "../../Model/DBConfig.php";
    $db = new Database();
    $db->connect();

    if(isset($_POST['submit_search'])) {
        $search = $_POST['search'];
        $data = $db->SearchData($search);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm người dùng</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php
        if(!empty($data)) {
            echo "<table>";
            echo "<tr><th>Họ tên</th> <th>Năm sinh</th> <th>Quê quán</th></tr>";
            foreach($data as $row) {
                echo "<tr><td>".$row['hoten']."</td> <td>".$row['namsinh']."</td> <td>".$row['quequan']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Không tìm thấy kết quả nào.";
        }
    ?>
</body>
</html>
