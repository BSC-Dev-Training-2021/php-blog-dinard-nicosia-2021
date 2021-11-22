<?php
if(isset($_POST['comment_bttn']))
{
    
    $blog_post_comment = $_POST['comment'];
    $blog_post_comment_obj = new blog_post_comment(); 
    $data = array(
        'comment' => $_POST['comment'],
        'user_id' => 1,
        'blog_post_id ' => $_SESSION['blog_id'],
        'created' => date("Y-m-d H:i:s")
    );
    $blog_post_comment_obj->getInsertData($data);

}
if(isset($_POST['read_more_bttn']))
{
    $_SESSION['blog_id'] = $_POST['blog_id'];
}
?>