<?php
require("utilities/functions.php");
require("../../database/connection.php");
require("lib_main.php");
require("lib_sql_que.php");
require("log_debug.php");
require("../models/model.php");
require('../models/blog.php');
require('../models/article.php');
require('../models/blog-category.php');
require('../models/blog_post_categories.php');
require('../models/blog_post_comment.php');
require('../models/user.php');
// function my_autoloader($class) {
//     include '../models/' . $class . '.php';
// }

// spl_autoload_register('my_autoloader');
session_start();
?>