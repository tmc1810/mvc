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

                </td>
            </tr>
            <?php
                $stt++;
                }
            ?>
        </tbody>
    </table>
</div>