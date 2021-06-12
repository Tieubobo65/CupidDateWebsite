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
    }
?>