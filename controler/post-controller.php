<?php
$blogpost = new blog();
    if(isset($_POST['submit_bttn'])){
        $data = array(
            
            'content' => $_POST['content'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'img_link' => $_FILES["img_link"]["name"],
            'created_by' => 1,
            'created' => date("Y-m-d H:i:s")
        );
        $filename = $_FILES["img_link"]["name"];
        $tempname = $_FILES["img_link"]["tmp_name"];
        $folder = "assets/images/" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
            debug_console("Image uploaded successfully");
        } else {
            debug_console("Failed to upload image");
        }
        
        $blogpost->blogPostInsert($data,$_POST['category']);
    }
?>