<?php
require("../../library/lib_handler.php");
require_once("../controlers/index-controller.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <title>My Blog - Home</title>
</head>

<body>
    <!-- Responsive navbar-->
    <?php include_once('navbar.php') ?>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <?php
                $blog = new blog();
                $result = [];
                if (isset($_GET['idCategory'])) {
                    $blog_post_category_id = $_GET['idCategory'];
                    $blog_post_category_obj = new blog_post_categories();
                    $resultIdCategory = $blog_post_category_obj->displayBlogpostId($blog_post_category_id);
                    // xdebug($resultIdCategory);

                    $result = $blog->findById($resultIdCategory);
                    //xdebug($resultByCat);

                } else {
                    $resultIdCategory = 1;
                    $result = $blog->getBlogByUser($resultIdCategory);
                    //xdebug($result);
                }
                //xdebug($result);
                foreach ($result as $value) {

                ?>
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="../../assets/images/<?php echo $value['img_link']; ?>" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php $phpdate = strtotime($value['created']);
                                                            $mysqldate = date('g:ia \o\n l jS F Y', $phpdate);
                                                            echo $mysqldate; ?></div>
                            <h2 class="card-title"><?php echo $value['title']; ?></h2>
                            <p class="card-text"><?php echo $value['description']; ?></p>
                            <form action="article.php" method="POST">
                                <input type="hidden" name="blog_id" value="<?php echo $value['id']; ?>">
                                <button class="btn btn-primary" name="read_more_bttn" type="submit">Read more →</button>
                            </form>

                        </div>
                    </div>
                <?php

                }
                ?>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">

                    <!-- Blog post-->
                    <?php
                    $AllBlogs = $blog->displayAllBlogs();
                    foreach ($AllBlogs as $value) {
                    ?>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="../../assets/images/<?php echo $value['img_link']; ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php $phpdate = strtotime($value['created']);
                                                                    $mysqldate = date('g:ia \o\n l jS F Y', $phpdate);
                                                                    echo $mysqldate; ?></div>
                                    <h2 class="card-title h4"><?php echo $value['title']; ?></h2>
                                    <p class="card-text"><?php echo $value['description']; ?></p>
                                    <form action="article.php" method="POST">
                                        <input type="hidden" name="blog_id" value="<?php echo $value['id']; ?>">
                                        <button class="btn btn-primary" name="read_more_bttn" type="submit">Read more →</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Blog post-->
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $categories_display = new categories();
                            $result = $categories_display->findAll();
                            foreach ($result as $value) {
                            ?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="index.php?idCategory=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                                    </ul>
                                </div>
                            <?php } ?>
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