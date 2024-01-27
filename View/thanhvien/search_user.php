<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;  /* Add padding to the cells */
        font-size: 20px;  /* Increase font size to 20 */
    }
    th {
        background-color: #000;  /* Change the background color of the header to black */
        color: #fff;  /* Change the text color of the header to white */
    }
</style>

<div class="danhsach">
    <h3 style="text-align: auto; margin-top: 50px;">Tìm kiếm thành viên</h3>
    <form method="GET" action="index.php" style="margin: center; min-width: 1px">
        <input type="hidden" name="controller" value="thanh-vien">
        <input type="hidden" name="action" value="search">
        <input type="text" name="search" placeholder="Nhập tên người dùng...">
        <input type="submit" name="submit_search" value="Tìm kiếm">
    </form>
</div>

<div class="danhsach">
    <h3 style="text-align: center; margin-top: 50px; color: #fff; background-color:green">Danh sách thành viên - Quản lý thành viên</h3>
    <table border="1px" style="margin: auto; min-width: 800px">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên thành viên</th>
                <th>Năm sinh</th>
                <th>Quê quán</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt=1;
                foreach($data as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value['hoten']; ?></td>
                <td><?php echo $value['namsinh']; ?></td>
                <td><?php echo $value['quequan']; ?></td>
                <td>
                    <a href="index.php?controller=thanh-vien&action=edit&id=<?php echo $value['id']; ?>">Edit</a>
                    <a href="index.php?controller=thanh-vien&action=delete&id=<?php echo $value['id'];?>" title="Xóa">Delete</a>
                </td>
            </tr>
            <?php
                $stt++;
                }
            ?>
        </tbody>
    </table>
</div>
