<?php
    class Database {
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'cupiddate_db';

        private $conn = NULL;
        private $result = NULL;

        //open a connection to database
        public function connect() {
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if(!$this->conn) {
                echo "Connect failed!";
                exit();
            } else {
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        //query 
        public function execute($sql) {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        public function getData() {
            if(!$this->result) {
                $data = 0;
            } else {
                $data = mysqli_fetch_array($this->result);
            }
            return $data;
        }

        public function getAllData($table) {
            $sql = "SELECT * FROM $table";
            $this->execute($sql);
            if(mysqli_num_rows($this->execute($sql))==0) {
                $data = 0;
            } else {
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function getSingleData($col, $table, $id_col, $id) {
            $sql = "SELECT $col FROM $table WHERE $id_col = $id";
            $this->execute($sql);
            $data = mysqli_fetch_array($this->execute($sql));
            return $data[$col];   
        }


        public function getAllDataBy($table, $col, $value) {
            $sql = "SELECT *FROM $table WHERE $col = $value";
            $this->execute($sql);
            if(mysqli_num_rows($this->execute($sql))==0) {
                $data = 0;
            } else {
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function updateUser($col, $value, $id) {
                $sql = "UPDATE users SET $col = '$value' WHERE id = $id";
                $this->execute($sql);
        }

    
    }
?>