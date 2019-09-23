<?php
session_start();
require_once "Config.php";

class User extends Config
{
    public function login($email, $password)
    { //ログインする為
        $hashed_password = md5($password);
        $sql = "SELECT * FROM users
                WHERE email = '$email' AND password = '$hashed_password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            //このSESSIONがheaqder.php(user)に名前を出している
            $_SESSION['user_id'] = $row['user_id'];
            if ($result->num_rows > 0) {
                if ($row['status'] == 'A') { //ADMINなのかUSERなのかをチェック
                    echo "<script>window.location.replace('admin/user_list.php');</script>";
                } else {
                    $this->redirect('user/index.php');
                }
            } else {
                echo "<p class='text-danger'>Invalid Username or Password</p>";
            }
        }
    }
    
    public function logout()
    {
    
        session_destroy();
        echo "<script>
                    function Redirect(){
                        window.location = 'index.php';
                    }
    
                    document.write('Logging out...');
                    setTimeout('Redirect()', 1000);
            </script>";
        exit;
    }
    
// Sign up
    public function save($email, $pass, $firstname, $lastname)
    {
        $new_password = md5($pass);
        $sql = "INSERT INTO users(email, password, firstname, lastname)
                VALUES ('$email', '$new_password', '$firstname', '$lastname')";

        $result = $this->conn->query($sql);

        if ($result) {
            $this->redirect('user/login.php');
        } else {
            echo "ERROR" . $this->conn->error;
        }
    }

// ログイン状態の時NAVに名前表示する
    public function selectOne($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_assoc();
        } elseif ($this->conn->error) {
            echo "ERROR" . $this->conn->error;
        }
    }

    // public function login_required_admin()
    // { //アドミンかどうかチェックする
    //     if (!isset($_SESSION['user_id'])) {
    //         echo "<script>window.location.replace('../login.php');</script>";
    //     } else {
    //         $id = $_SESSION['user_id'];
    //         $sql = "SELECT * FROM users WHERE user_id = $id";
    //         $result = $this->conn->query($sql);
    //         if ($result->num_rows > 0) {
    //             $row = $result->fetch_assoc();

    //             if ($row['status'] == 'U') { //ユーザーだったらログインに戻される
    //                 echo "<script>window.location.replace('../login.php');</script>";
    //             }
    //         }
    //     }
    // }


    
    // public function selectAll()
    // {
    //     $sql = "SELECT * FROM users ORDER BY user_id ASC";
    //     $result = $this->conn->query($sql);
    //     $rows = array();
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $rows[] = $row;
    //         }
    //         return $rows;
    //     } else {
    //         return false;
    //     }
    // }


    // public function update($id, $username, $email, $firstname, $lastname)
    // {
    //     $sql = "UPDATE users SET username = '$username', email = '$email',
    //             firstname = '$firstname', lastname = '$lastname' WHERE user_id = $id";
    //     $result = $this->conn->query($sql);

    //     if ($result) {
    //         return true;
    //     } else {
    //         echo "ERROR" . $this->conn->error;
    //     }
    // }

    // public function delete($id)
    // {
    //     $sql = "DELETE FROM users WHERE user_id = $id";
    //     $result = $this->conn->query($sql);

    //     if ($result) {
    //         return true;
    //     } else {
    //         echo "ERROR" . $this->conn->error;
    //     }
    // }

}
