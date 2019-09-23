<?php

    require_once "Config.php";

    class Category extends Config {
        
        public function selectAll() {
            $sql = "SELECT * FROM categories ORDER BY category_id ASC";
            $result = $this->conn->query($sql);
            $rows = array();
            
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $rows[] = $row; // ROWを確認する
                }
                return $rows;
            }  else {
                return false;
            }
        }
        
        public function selectOne($id) {
            $sql = "SELECT * FROM categories WHERE category_id = $id";
            $result = $this->conn->query($sql);

            if($result) {
                return $result->fetch_assoc();
            } elseif($this->conn->error) {
                echo "ERROR" . $this->conn->error;
            }
        }

        public function save($category_name) {
            $sql = "INSERT INTO categories(category_name)
                    VALUES ('$category_name')";

            $result = $this->conn->query($sql);

            if($result) {
                echo "<script> alert('successfully added!')</script>";
                $this->redirect('category_add.php');
            } else {
                echo "ERROR" . $this->conn->error;
            }
        }

        public function update ($id, $category_name) {
            $sql = "UPDATE categories SET category_name = '$category_name'
                    WHERE category_id = $id";
            $result = $this->conn->query($sql);

            if($result) {
                $this->redirect('category_list.php');
            } else {
                echo "ERROR";
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM categories WHERE category_id = $id";
            $result = $this->conn->query($sql);

            if($result) {
                $this->redirect('category_list.php');
            }
        }

    }

?>