<?php

    require_once 'Config.php';

    class Item extends Config {
        public function selectAll() {
            $sql = "SELECT * FROM items 
                    WHERE category_id = 2";

            $result = $this->conn->query($sql);
            $rows = array();

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            } else {
                return false;
            }
        }

        public function selectAllImage($id) {
            $sql = "SELECT * FROM image WHERE item_id='$id'";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0) {
                $rows = array();
                while($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            } else {
                return false;
            }
        }
        public function selectMainImage($id) {
            $sql = "SELECT * FROM image WHERE item_id='$id' LIMIT 1";
            $result = $this->conn->query($sql);
           
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } elseif($this->conn->error){
                echo "ERROR";
            }
        }

        public function selectOne($id) {
            $sql = "SELECT * FROM items WHERE item_id = $id";
            $result = $this->conn->query($sql);

            if($result) {
                return $result->fetch_assoc(); 
            } elseif($this->conn->error){
                echo "ERROR";
            }
        }

        public function save($item_name, $category_id, $user_id, $item_desc, $item_price, $item_quantity, 
                            $image1, $tmp_image1, $image2, $tmp_image2, $image3, $tmp_image3, $image4, $tmp_image4, $image5, $tmp_image5,
                            $image1_name, $image2_name, $image3_name, $image4_name, $image5_name){

            $sql = "INSERT INTO items(item_name, category_id, user_id, item_desc, item_price, item_quantity)
                    VALUES ('$item_name', '$category_id', '$user_id', '$item_desc','$item_price', '$item_quantity')";
            
            $result = $this->conn->query($sql);

            if($result) {
                $item_id = $this->conn->insert_id; //ADDしたことによって作られたIDを取得する

                $insert_image1 = $this->save_image($item_id, $image1, $tmp_image1, $image1_name);
                $insert_image2 = $this->save_image($item_id, $image2, $tmp_image2, $image2_name);
                $insert_image3 = $this->save_image($item_id, $image3, $tmp_image3, $image3_name);
                $insert_image4 = $this->save_image($item_id, $image4, $tmp_image4, $image4_name);
                $insert_image5 = $this->save_image($item_id, $image5, $tmp_image5, $image5_name);
                if($insert_image1 == TRUE AND $insert_image2 == TRUE AND $insert_image3 == TRUE AND $insert_image4 == TRUE AND $insert_image5 == TRUE){
                    echo "<script> alert('Successfully added 5 images!')</script>";
                    // $this->redirect('item_add.php');
                    header("Location: item_add.php");
                }
            } else {
                echo "ERROR";
            }
        }

        public function save_image($item_id, $image, $tmp_image, $image_name){
            $path = "../uploads/item_images/";

            $sql = "INSERT INTO image(item_id, image_path, image_name)
                       VALUES($item_id, '$path', '$image_name')";
            
            $result = $this->conn->query($sql);

            if($result) {
                move_uploaded_file($tmp_image, $image);
                return TRUE;
            } else {
                echo "ERROR" . $this->conn->error;
            }

            // if(move_uploaded_file($tmp_image, $image)){
            //     $sql = "INSERT INTO image(item_id, image_path, image_name)
            //             VALUES($item_id, '$path', '$image_name')"; //file name that i upload

            //     $result = $this->conn->query($sql);

            //     if($result) {
            //         return TRUE;
            //     } else {
            //         echo "ERROR" . $this->conn->error;
            //     }
            // }
        }

        public function update ($id, $item_name, $category_id, $item_desc, $item_price, $item_quantity){
            $sql = "UPDATE items SET item_name = '$item_name', category_id = '$category_id', item_desc = '$item_desc',
                    item_price = '$item_price', item_quantity = '$item_quantity'
                    WHERE item_id = $id";

            $result = $this->conn->query($sql);

            if($result) {
                $this->redirect('item_list.php');
            } else {
                echo "ERROR";
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM items WHERE item_id = $id";

            $result = $this->conn->query($sql);

            if($result) {
                $this->redirect('item_list.php');
            } else {
                echo "ERROR";
            }
        }








    }



?>