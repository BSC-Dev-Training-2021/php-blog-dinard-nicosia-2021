<?php
if (!isset($_SESSION['blog_id'])) {
    $_SESSION['blog_id'] = 0;
}
if (isset($_GET['idCategory'])) {
    $categories_display = new categories();
    $result = $categories_display->findById($_GET['idCategory']);
}
$blog = new blog();
$result = [];
if (isset($_GET['idCategory'])) {
    $blog_post_category_id = $_GET['idCategory'];
    $blog_post_category_obj = new blog_post_categories();
    $resultIdCategory = $blog_post_category_obj->displayBlogpostId($blog_post_category_id);
    $result = $blog->findById($resultIdCategory);
} else {
    $resultIdCategory = 1;
    $result = $blog->displayAllBlogs();
}
$AllBlogs = $blog->displayAllBlogs();

