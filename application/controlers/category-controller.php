<?php
$nav_name = "Add";
$nav ="primary";
$nav_bttn = "submit_bttn";
$name_value ="";
    if(isset($_POST['submit_bttn'])){
        $data = array(
            'name' => $_POST['name']
        );
        $categoriesData = new categories();
        $categoriesData->getDataDisplay($data);
    }
    if(isset($_POST['edit_bttn'])){
        $nav_name = "Edit";
        $nav ="warning";
        $nav_bttn = "edit_final_bttn";
        $name_value = $_POST['name'];
        $id_value = $_POST['id'];
        // $data = array(
        //     'id' => $_POST['id'],
        //     'name' => $_POST['name']
        // );
        // xdebug($data);
        // $categoriesData = new categories();
        // $categoriesData->getDataEdit($data);
    }
    if(isset($_POST['edit_final_bttn'])){

        $data = array(
            'name' => $_POST['name']
        );
        $_SESSION['id_category'] = $_POST['id'];
        $categoriesData = new categories();
        $categoriesData->getDataEdit($data);
    }
    if(isset($_POST['delete_bttn'])){
        
        $categoriesData = new categories();
        $BPcategoriesData = new blog_post_categories();
        $data = array(
            'category_id' => $_POST['id']
        );
        $categoriesData = new categories();
        $categoriesData->getDataDelete($_POST['id']);
        
    }
