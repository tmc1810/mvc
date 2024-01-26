<?php
    class Database {
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'quanlythanhvien_mvc';
    
        private $conn = NULL;
        private $result = NULL;

        public function connect() 
        {
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if(!$this->conn) {
                echo "Kết nối thất bại";
                exit();
            }
            else{
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        // Thực thi câu lệnh truy vấn:

        public function excute($sql)
        {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        // Phương thức lấy dữ liệu:
        public function getData() 
        {
             if($this->result) {
                $data = mysqli_fetch_array($this->result);
             }
             else{
                $data = 0;
             }
             return $data;
        }

        //Phương thức lấy toàn bộ dữ liệu:
        public function getAllData($table)
        {
            $sql = "SELECT * FROM $table";
            $this->excute($sql);
            if($this->num_row()==0) {
                $data=0;
            }
            else {
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        // Phương thức lấy dữ liệu cần sửa theo id
        public function getDataID($table, $id) 
        {
            $sql = "SELECT * FROM $table WHERE id = '$id'";
            $this->excute($sql);
             if($this->num_row() != 0) {
                $data = mysqli_fetch_array($this->result);
             }
             else{
                $data = 0;
             }
             return $data;
        }

        //Phương thức đếm số lượng bản ghi
        public function num_row() {
            if($this->result) {
                $num = mysqli_num_rows($this->result);
            }
            else {
                $num=0;
            }
            return $num;
        }

        // Phương thức thêm dữ liệu:
        public function InsertData($hoten, $namsinh, $quequan) {
            $sql = "INSERT INTO thanhvien(id, hoten, namsinh, quequan)VALUES(null, '$hoten', '$namsinh', '$quequan')";
            return $this->excute($sql);
        }

        // Phương thức sửa dữ liệu:
        public function UpdateData($id, $hoten, $namsinh, $quequan)
        {
            $sql = "UPDATE thanhvien SET hoten = '$hoten', namsinh = '$namsinh', quequan = '$quequan WHERE id = '$id'";
            return $this->excute($sql);
        }

        //Phương thức xóa:
        public function Delete($id)
        {
            $sql = "DELETE FROM thanhvien WHERE id = '$id'";
            return $this->excute($sql);
        }
    }
?>