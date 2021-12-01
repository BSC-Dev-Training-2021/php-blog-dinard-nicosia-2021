<?php
require("../../library/lib_handler.php");
include_once("../controlers/category-controller.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>Blog Post - Start Bootstrap Template</title>
</head>

<body>
    <!-- Responsive navbar-->
    <?php include_once('navbar.php') ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-7 align-self-start">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Contact Us header-->
                        <nav class="navbar navbar-expand-lg navbar-light bg-<?php echo $nav; ?> mb-3">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Category</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#"><?php echo $nav_name; ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <!-- Post content-->

                        <section class="mb-8">

                            <form method="POST" action="category.php">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Category Name</span>
                                    <input type="text" name="name" class="form-control" value="<?php echo $name_value; ?>" placeholder="">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $id_value; ?>">
                                </div>
                                <button type="submit" name="<?php echo $nav_bttn; ?>" class="btn btn-<?php echo $nav; ?> mt-2">Save</button>
                            </form>
                        </section>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>

            <!-- Side widgets-->
            <div class="col-lg-5">
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    foreach ($result as $value) {
                                    ?>
                                        <tr>
                                            <form action="category.php" method="POST">
                                                <th scope="row"><?php echo $value_num++; ?></th>
                                                <td><?php echo $value['name']; ?></td>
                                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                                <input type="hidden" name="name" value="<?php echo $value['name']; ?>">
                                                <td><button type="submit" name="edit_bttn" class="btn-sm btn-warning"> Edit </button>
                                                <?php
                                                $BPcategoriesData = new blog_post_categories();
                                                 $resultFind = $BPcategoriesData->getDataDeleteFind($value['id']);
                                                 if(!$resultFind){
                                                     ?>
                                                     <button type="submit" name="delete_bttn" class="btn-sm btn-danger">Delete</button>
                                                     <?php
                                                 }
                                                ?>
                                                    
                                                </td>
                                            </form>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <form action="post.php" method="POST">
                                <input name="blog_input" class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button type="submit" name="post_bttn" class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php include_once('footer.php'); ?>
</body>

</html>