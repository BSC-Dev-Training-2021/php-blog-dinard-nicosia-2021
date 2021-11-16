<?php
$blogpost = new blogpost();
    if(isset($_POST['submit_bttn'])){
        unset($_POST['submit_bttn']);
        $data = array(
            
            'content' => $_POST['content'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'img_link' => $_FILES["img_link"]["name"],
            'created_by' => 1,
            'created' => date("Y-m-d H:i:s")
        );
        $blogpost->insert($data);
    }
?>