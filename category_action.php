<?php

    require_once "../classes/Category.php";

    $category = new Category; //インスタンス（オブジェクト）

    if($_GET['action'] == 'add') {
        $category_name = $_POST['category_name'];

        $result = $category->save($category_name);

        // if ($result) {
        //     $category->redirect('category_list.php');
        // } else {
        //     $category->redirect('category_add.php');
        // }
    }
    // elseif($_GET['action'] == 'update') {
    //     $id = $_POST['category_id'];
    //     $category_name = $_POST['category_name'];

    //     $result = $category->update($id,$category_name);

    //     if($result) {
    //         $category->redirect('category_list.php');
    //     } else {
    //         echo "Error";
    //     }
    // }
    // elseif($_GET['action'] == 'delete') {
    //     $id = $_GET['category_id'];
    //     $result = $category->delete($id);

    //     if($result) {
    //         $category->redirect('category_list.php');
    //     } else {
    //         echo "ERROR";
    //     }
    // }
?>